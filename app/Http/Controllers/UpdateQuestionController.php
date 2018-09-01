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

        if($request->update =='optout'){

            
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        
                        'tutor_id'   => $request->user_id,
                       
                        'current' => 1,
                        
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

            //post comments
            $this->postComment("<h4>The tutor opted out of the Question: </h4>".$request->reason, 
                $question, $request->update);
        }


        if($request->update =='activate'){

            
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        
                        'tutor_id'  => $request->user_id,
                       
                        'active'    => 0,

                        'cancelled' => 0,
                        
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

            //post comments
            $this->postComment("<h4>The Question has been re-activated </h4>".$request->reason, 
                $question, $request->update);
        }

        if($request->update =='accept-ans'){

            //change status to accepted 

          $this-> UpdateQuestion('completed', $question);

           //update te question ratings
            
        }


        if($request->update =='unassign'){
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [  
                        'answered' => 0,
                        'assigned' => 0,
                        'current' => 1,
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

            //post comments
            $this->postComment("You have been unassigned from the Question, thank you for using our platform", $question, $request->update);
        }

        if($request->update =='cancel'){
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        'cancelled' => 1,
                        'active'    =>1,
                        'reassigned' => 0,
                        'user_id'   => Auth::user()->email,
                        'completed' => 0,                       
            
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

            //post comments
            $this->postComment("The question has been Cancelled, thank you for using our tutoring platform. For more quesries, contact our customer care.",$question, $request->update);

         
        }

        if($request->update =='revision'){
            /**
             * Post to assigned matrix
             */
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                       
                        'revision' => 1,
                        'answered' => 0,
                        'assigned' => 1,
                        'current' => 0,
                        'paid' => 0,
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

              //post comments
            $this->postComment("The question has been set on revision, please ensure that you submit the revision on time. ",$question, $request->update);

        }

        /**
         * Completed Questions
         */
        if($request->update =='completed'){

            /**
             * Post to assigned matrix
             */
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        'completed' => 1, //accepted
                        'rated' => 1,
                       
                        'tutor_id'   => $request->user_id,
                      
                        'answered' => 1,
                        'assigned' => 1,
                         'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

              //post comments
            $this->postComment("The question is now complete. You can browse more questions and make more money.", $question, $request->update);

        }

        
        if($request->update =='rated'){
            /**
             * Post to assigned matrix
             */
            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                    
                        'rated'         => 1,
                        'user_id'       => $request->user_id,               
                        
                        
                        'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

        
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

            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        
                        'reassigned'    => 1,                        
                        'rated'         => 0,
                        'user_id'       => $request->user_id,
                        'tutor_id'      => $request->tutor_id,                        
                        'assigned'      => 1,
                        'current'       => 0,
                        'paid'          => 0,
                        'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );



                $this->postComment($request->comments_body , $question, $request->update);



        }

        /*
         * Check if the request is commit
         */


        if($request->update =='commit'){
            

            if($request->tutor_id != null){
                $user_id =$request->user_id; 
            }
            else {
                $user_id = $request->tutor_id;
            }

            //post comments

            $this->postComment("Thank you for taking this question. Please provide a quality, plagiarism free answer within the deadline",$question, $request->update);

            DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        'cancelled'         => 0,
                       // 'user_id'           =>
                        'reassigned'        => 0,
                        'completed'         => 0,
                        'rated'             => 0,
                        'paid'              => 0,
                        'revision'          => 0,
                        'tutor_id'           => $request->user_id,
                        'answered'          => 0,
                        'assigned'          => 1,
                        'current'           => 0,
                        'paid'              => 0,
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

            /**
             * Keep Question history here
             */

        }

        /*
         * Check if the request is dispute
         */

        if($request->update =='dispute'){
            DB::table('dispute_questions')->insert(
                [
                    'status' => 'disputed',
                    'question_id' =>$question,
                    'reason' => $request->input('message'),
                    'user_id' => Auth::user()->email,
                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

            //post comments

            $this->postComment("The question has been disputed. Kindly browse other questions as we resolve the issue. Resolving disputes takes approximately 24 hours.",$question, $request->update);
        }
         

        /*
         * Check if the request is finished
         */

        if($request->update =='completed'){

             DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [
                        
                                      
                        'user_id'       => $request->user_id,
                        
                        
                        'completed'      => 1,                      
                        'paid'          => 1,
                        'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

                $this->postComment("The question has been reassigned. Thank you for using our tutoring platform.", $question, $request->update);

            

        }

        /*
        * Check if the request is paid
        */

        if($request->update =='paid'){

             DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [ 
                        'user_id'       => $request->user_id,
                        
                        
                      
                        'paid'          => 1,
                        'updated_at'    => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );       

        }
    
        return redirect()->back();

    }

    public function UpdateQuestion($status, $question)
    {
         DB::table('question_matrices')->where('question_id', $question)
                ->update(
                    [                                   
             
                                             
                        'status' =>$status,
            
                      
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );
    }

    public function QuestionHistory($status, $question){

        DB::table('question_histories')->insert(
            [
                'status' => $status,
                'question_id' =>$question,
                'user_id' => Auth::user()->email,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);


    }
}
