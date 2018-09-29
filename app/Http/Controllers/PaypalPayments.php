<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\ExpressCheckout;

use Auth;


class PaypalPayments extends Controller
{
	//https://github.com/srmklive/laravel-paypal

	private $price;

	private $invoiceID;


    public function PayWithPaypalCallback (Request $request)
	{
		$provider = new ExpressCheckout;

		$token = $request->token;

		$data = $this->paymentData($this->price);


		$PayerID = $request->PayerID;

		$response = $provider->getExpressCheckoutDetails($token);

		$invoiceID = $this->invoiceID;


		//dd($response);

		
		$provider->doExpressCheckoutPayment($data, $token, $PayerID);
		

		// The $token is the value returned from SetExpressCheckout API call
		$response = $provider->createBillingAgreement($token);

		$response = $provider->getTransactionDetails($token);

		return $response;

		return redirect()->route('success');
		
	}

	private function paymentData ($price){

		$price = substr($price,2);

		$this->price = intval($price);

		$data = [];
		$data['items'] = [
		    [
		        'name' => "Question Heading",
		        'price' => $this->price,
		        'qty' => 1
		    ],
		    
		];

		//$data['name'] = Auth::user()->username;

		$data['invoice_id'] = uniqid();
		$this->invoiceID = $data['invoice_id']; 
		$data['invoice_description'] = "Payment for an Essay";
		$data['return_url'] = route('paypal-callback');
		$data['cancel_url'] = route('paypal-error');


		$total = $price;
		
		$data['total'] = $total;


		//give a discount of 10% of the order amount
		$data['shipping_discount'] = round((3/ 100) * $total, 2);


		return $data;


	}
  
   public function PayWithPaypal(Request $request, $price)
   {
   	
	   $provider = new ExpressCheckout;


	   $data = $this->paymentData($price);
	   

		$response = $provider->setExpressCheckout($data);

		return redirect($response['paypal_link']);

   }
}
