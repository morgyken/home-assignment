<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Storage;
use Response;
use Session;
use App\CreditCardDetails;
use App\Transaction;
use App\MakePaymentModel;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class UpdateQuestionController extends Controller
{
    //post comments 

    public function postComment($comment,  $question, $message_type)
    {
        DB::table('post_comments')->insert(
                [
                    'comment_body' => $comment,
                    'comments_id' =>  rand(1000, 9999),
                    'question_id' => $question,
                    'message_type'=>  $message_type,
                    'user_id' => Auth::user()->email,
                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
    }

    public function UpdateQuestionStatus(Request $request, $question)
    {
        /**
         * Cancel Question here
         */

        $tutor = DB::table('assign_questions')->select('tutor_id')->where('question_id', $question)->first();


        if($request->update =='optout'){

             $this-> UpdateQuestion('new', $question);
        
        }        

        if($request->update ==='revision'){
            /**
             * Post to assigned matrix
             */
           
                  $this-> UpdateQuestion('revision', $question);


        }

        if($request->update =='accept-ans'){
            //change status to accepted 

          $this-> UpdateQuestion('completed', $question); 

          //handle question Ratings


        }


       if($request->update =='post-ans'){
            //file uploads

            $file = Input::file('file');

            if(is_array($file)){
                 $dest = public_path().'/storage/uploads/'.$question.'/answer/';

               // $dest = public_path().'/storage/uploads/'.$question.'/answer/';

                foreach ($file as $files){
                    /**
                     * loop through multiple files
                     */

                    $name =  $files->getClientOriginalName();
                    $files->move($dest, $name);
                }

            }

            
           //update status 

           $this-> UpdateQuestion('answered', $question);



         }


    if($request->update =='reassigned'){

        $this-> UpdateQuestion('new', $question);

      }

            
    public function UpdateQuestion($status, $question)
    {
         DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [        
                                             
                        'status' =>$status,
                        'user_id' => Auth::user()->email,                      
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );
    }

    
}
