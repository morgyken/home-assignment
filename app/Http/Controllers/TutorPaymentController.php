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
    }
