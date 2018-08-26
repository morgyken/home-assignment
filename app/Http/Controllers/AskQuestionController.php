<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QuestionStatusModel;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use Storage;
use App\Http\Controllers\PaymentController;
use Response;
use Session;
use App\AcceptQuestion;
use App\AssignQuestion;
use App\CreditCardDetails;
use App\Transaction;
use App\User;
use App\PostcommentModel;
use App\MakePaymentModel;
use App\DateTimeModel;
use App\PostAnswer;
use App\PostQuestionModel;
use App\PostQuestionPrice;
use App\SuggestDeadline;
use App\SuggestPriceIncrease;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class AskQuestionController extends Controller
{
    public function __costruct()
    {
        $this->middleware('QuestionOverdue');
    }

    public function UpdateBonus()
    {                //update tutor payment

        DB::table('tutor_payment')->where('order_id', session('question_id'))
                    ->update(
                        [
                            'amount' => round($request['question_price'] *8* 0.22, 2),
                            'tutor_id' => Auth::user()->email,
                            'paid_by'  => Auth::user()->email,
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                 );

        DB::table('question_bodies')->where('question_id', session('question_id'))
        ->update(
            [
                'category' => $request->category,
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]
     );
        return redirect()->route('get-payment');

    }

    public function PostMetadata(Request $request){
        //   'name', 'email' ,'country','city', 'state', 'zip'

        $question_id =  $request->session()->get('question_id');

        $price = DB::table('post_question_prices')
       				->select('question_price')
       				->where('question_id', $question_id)
       				->first();

        DB::table('payment_metadata')->insert(
            [
                'name' => $request->name,
                'email' =>Auth::User()->email,

                'country' => $request->country,
                'city'    => $request->city,

                'state' => $request->state,
                'zip' => $request->zip,

                'amount' =>$price->question_price,
                'token'=> "#". substr($question_id, 0,17),
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);

          return redirect()->route('get-cust-payments');
    }

    public function getMetadata(){

      return view('cust.cust-payments-meta');

    }

    
    public function postQuestion(Request $request)
    {
        $question_id = rand (99999,999999); 
        

        $number_of_words = rand (200,250);

        $summary =  strip_tags(substr($request->question_body,0, $number_of_words));

        /*
         *
         * file picker starts here
         */

        $file = Input::file('file');

        if(is_array($file)){

            $dest = public_path().'/storage/uploads/'.$question_id.'/question/';

            foreach ($file as $files){
                /*
                 * loop through multiple files
                 */
                $name =  $files->getClientOriginalName();
                $files->move($dest, $name);
            }

        }

        /*
         * Insert into database
         */

        DB::table('question_bodies')->insert(
            [
                'question_body' => $request['question_body'],
                'user_id' => Auth::user()->email,
                'topic'    => $request->topic,
                'academic_level'    => $request->academic_level,
                'question_id' => $question_id,
                'summary' => $summary,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

            ]);

        DB::table('question_matrices')->insert(
            [
                'user_id' => Auth::user()->email,
                'question_id' =>$question_id,
                'current' => 1,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ]);


       $request->session()->put('question_id',  $question_id);

        // store session amount

        $request->session()->put('order_summary', substr($request['question_body'], 0, 200));

        //redirect to post deadline view

        return redirect() -> route('deadlinePrice');
    }


    public function postQuestionDetails(Request $request)
    {
        /*
         * Insert into database
         */

        DB::table('question_details')->insert(
            [
                'urgency' => $request['urgency'],
                'user_id' => Auth::user()->email,
                'question_id'    => $request->seesion()->get('question_id'),
                'pagenum'    => $request->pagenum,
                'order_subject' => $request->order_subject,
                'paper_type' => $request ->paper_type,

                'spacing' => $request['spacing'],
                'paper_format' => $request->paper_format,
                'academic_level'    => $request->academic_level,
                'lang_style'    => $request->lang_style,
                'question_price' => $request->question_price,
                'university' => $request->university,
                'order_summary' =>$request->session()->get('order_summary'),

                'question_deadline' => $request->question_deadline,
                
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()

            ]);

        //add the question prices to session 

        $request->session()->put('question_price', 

                $request->question_price  
            );

        //redirect to post deadline view

        return redirect() -> route('customer.meta');
    }


    
}
