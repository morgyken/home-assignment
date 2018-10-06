<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;


class PaymentControllerOne extends Controller
{
    private $_api_context;

    private $qid;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {
        return view('paywithpaypal');
    }
    public function payWithpaypal(Request $request, $price, $qid)
    {  
        $this->qid = $qid;

        $price = intval($price);
        $shipp = (0.024) * $price;

        $tax  = 0.16 * $price;

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        //Itemized information (Optional) Lets you specify item wise information

        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($price);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $details = new Details();
        $details->setShipping($shipp)
            ->setTax($tax)
            ->setSubtotal($price);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($price + $shipp + $tax)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

    
        $payment = new Payment();

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));


        $payment->setIntent("order")
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        //For Sample Purposes Only.

        $request = clone $payment;

       

        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {

                \Session::put('error', 'Some error occur, sorry for inconvenient');

                //return "Payment Successful";

                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('/');
  
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            \Session::put('error', 'Payment failed');
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            \Session::put('success', 'Payment success');

            return Redirect::to('/payment/success/'.$this->qid);

        }

        \Session::put('error', 'Payment failed');

        return Redirect::to('/payment/failed/'.$this->qid);

    }


    public function getPaymentSuccess (){

        return redirect()->route('home');

    }

    public function getPaymentFailed (){

        return view('payments.failed' );

    }



}
