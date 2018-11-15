<?php

namespace App\Http\Controllers;
use DB;
use Storage;
use Response;
use Session;
use Illuminate\Http\Request;
use Auth;

class TutorPaymentController extends Controller
{


    public function postPayments(Request $request)
    {
    	$payment_id = rand(9999,999999);

    	$user = Auth::user()->email;

    	$order_array = json_decode($request->order_array);

    	foreach ($order_array as $key => $value) {
    		$payment_id1 = rand(9999,999999);
    		# code...
    		DB::table('tutor_payment')->where('order_id', $value)
                  ->update(
                [
                    'tutor_id' 		=>$request->tutor_id,

                    'payment_id'	=> $payment_id1,

                    'status'		=> 'Paid',

                    'paid_by'		=> $request->paidby,

                    'amount'  =>$request->amount,

                    'created_at' 	=>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' 	=> \Carbon\Carbon::now()->toDateTimeString(),
                ]);
    	}

                return redirect()->route('get-payment');
    	}

        public function tutorPayment ()
        {
            // Check if it is Thurs
            $tutor_payment = 0;

            $today = new Carbon();
        
            // Select the total from the orders done upto 7 days ago

            // Select the total 
            if($today->dayOfWeek == Carbon::THURSDAY)
            {

            $tutor_payment = DB::table('question_details')
            
            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status', '=','Rated')

            ->where( 'updated_at', '>', Carbon::now()->subDays(8))

            ->where('question_matrices.tutor_id', '=', Auth:: User()->id)

            ->sum('question_details.tutor_price');

            }

            // post to database


           //post the total on the Home page 


            //mark all of them as paid
        }
    }
