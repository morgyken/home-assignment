<?php

namespace App\Http\Controllers;
use App\QuestionStatusModel;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;
use Storage;
use App\AcademicLevel;
use Response;
use Session;
use App\AcceptQuestion;
use App\AssignQuestion;
use App\CreditCardDetails;
use App\Transaction;

use App\QuestionCategories;
use App\User;
use App\PostComments;
use App\MakePaymentModel;
use App\DateTimeModel;
use App\PostAnswer;
use App\PostQuestionModel;
use App\PostQuestionPrice;
use App\QuestionMatrix;
use App\SuggestDeadline;
use App\SuggestPriceIncrease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class QuestionController extends AdminController
{
    /*
    * Get the question starts, used in the view for links
    */
    public static function questionStat($column)
    {
        //$user = Auth::user()->email;
        $user= 'morgyken@gmail.com'; 

        $countAssigned = DB::table('question_matrices')->select($column)
        ->where('user_id',$user)  
        ->where($column, 1) 
        ->get();

        return  count($countAssigned);
    }
    /*
     * Suggest Price Increase here
     * The real course the price
     */

    public function PayRequests(Request $request){

        $request_id = Input::get('checkbox');

        if(is_array($request_id)) {
            foreach ($request_id as $request => $val) {
                DB::table('payment_requests')->where('request_id', $val)
                    ->update(
                        [
                            'status' => 'paid',
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );
            }
        }

        return redirect()->route('adm-tut-payments');
    }
    
    public function PostPaymentRequest(Request $request, $amount){
        
        $request_id = str_random(12);
        
        $user_id = Auth::user()->email;
        
        DB::table('payment_requests')->insert(
            [              
                'user_id' => Auth::user()->email,
                'amount' => $amount,
                'request_id' => $request_id,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

        $questions = Session::get('questions');

        foreach($questions as $comm => $val){
            DB::table('post_question_prices')->where('question_id', $val)
                ->update(
                    [
                        'paid' => 1,
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                    ]
                );

        }

            return redirect()->route('tut-profile', ['email'=>$user_id]);
    }

    public function suggestPricePrice(Request $request, $question)
    {
        $quest = new SuggestPriceIncrease;

        /*
         * Get the question ID
         * Insert using Eloquent
         * Get question ID
         */

        $quest->question_id = $question;

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->suggested_price = $request->input('suggested_price');

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->user_id = Auth::user()->email;
        $quest->save();

        return redirect()->route('question.det', ['question_id'=> $question]);
    }
    
    /*
     * file download from the view 
     * $qeustion is the question iD
     * File name is the passed file name
     * $type can be questron or answer folder
     */
    
    public function downloads($question, $fileName, $type){
        
            $path = public_path().'/storage/uploads/'.$question.'/'.$type.'/'.$fileName;   

            return Response::download($path);
    }

    /*
     * comments files download
     */

    public function CommentFilesDownload($question, $fileName, $comment_id){

        $path = public_path().'/storage/uploads/'.$question.'/comments/'.$comment_id.'/'.$fileName;

        return Response::download($path);
    }


    public static function CommentFiles($comment_id, $question_id){


        $path_comm = public_path().'/storage/uploads/'.$question_id.'/comments/'.$comment_id;

        $manuals = [];

        $filesInFolder = \File::files($path_comm);



        foreach($filesInFolder as $path)
        {
            $manuals [] = pathinfo($path);
        }


        return $manuals;

    }

    /*
     * get question details
     */
    public function QuestionDetails($question_id, $optional=null){
        $email = Auth::user()->email;

        $details = $this->findTutorprofile($email, $optional);


        $sum = $details['sum'];

        $sum_2 = $details['sum2'];

        $comments12 = $details['comments'];

        $count=  $details['count'];


        $question_price= PostQuestionPrice::where('question_id',$question_id)->firstOrFail();

        
        $question = PostQuestionModel::where('question_id', $question_id)->firstOrFail();
        /*
         * Pull question price in this model quesry
         *
         */
    
        $status = DB::table('question_matrices')->where('question_id',$question_id)->first();
          
        $time = new DateTimeModel();

        /*
        * return the comments in the following
        *
        */

        $interval = $time ->getDeadlineInSeconds($question_id);

        /*
         * return the comments in the following
         *
         */

        if(
        empty(
        $comments= PostComments::where('question_id', $question_id)->first()
        )

        )
        {
            $comments = [];
        }
        else{

            $comments= DB::table('post_comments')
                ->where('question_id', $question_id)
                ->get();
        }

      
        if(
        empty(
        $tutor= User::where('user_role', 'tutor')->get()
        )

        )
        {
            $tutor= [];
        }
        else{

            $tutor= DB::table('users')
                ->where('user_role','tutor')
                ->get();
        }




        

      if(
        empty(
        $answer12= PostComments::where('question_id', $question_id)->first()
        )

        )
        {
            $answer12 = [];
        }
        else{

           $answer12 = DB::table('post_answers')
                ->where('question_id', $question_id)
                ->get();
        }

        if(
        empty(
        $priceSuggestion= SuggestPriceIncrease::where('question_id', '=', $question_id)->first()
        )

        )
        {
            $priceSuggestion= array();
        }
        else{

            $priceSuggestion = DB::table('suggest_price_increases')->where('question_id', '=', $question_id) ->get();
        }
        /*
       * Get Sugegsted deadline
       */

        if(
        empty(
        $deadlines= SuggestDeadline::where('question_id', '=', $question_id)->get()
        )

        )
        {
            $deadlines= array();
        }
        else{

            $deadlines = DB::table('suggest_deadlines')->where('question_id', '=', $question_id) ->get();
        }
        

        $posted= DB::table('question_bodies')->where('question_id', '=', $question_id)->value('created_at');
        

            $user12 = Auth::User()->email;

            $user = DB::table('users')->where('email', '=', $user12) ->get();

            /**
             * Question files generator
             */
            
            $path_question = public_path().'/storage/uploads/'.$question_id.'/question/';

            //dd($path_question);
                                

            $manuals = [];
         
            $filesInFolder = \File::files($path_question);



            foreach($filesInFolder as $path)
            {
                $manuals[] = pathinfo($path);
            }

        /**
         * Answer files generator
         */
        $path_ans = public_path().'/storage/uploads/'.$question_id.'/answer/';


        $manuals_ans = [];

        $filesInFolder_ans = \File::files($path_ans);

        foreach($filesInFolder_ans as $path)
        {
            $manuals_ans[] = pathinfo($path);
        }


        return view ('quest.question-det', [

         // return view ('quest.question-det12', [

            /*
             * Get user type here
             */
            'user' =>$user,
            
            /*
             * Return Comments
             */
            
            'comments' => $comments,

            /*
             * Get Question
             */

            'question' => $question,
            
            /*
             * Files and more file details 
             */
            
            'files'=>$manuals,

            /*
             * Assigned is assigned
             */

            'status'=>$status,

           

            //get tutors for select
            'tutors' => $tutor,

             //their own car

            'sum' => $sum,

            //answer body

            'answer' => $answer12,


            'sum_2' => $sum_2,


            'question_price' => $question_price,
            /*
             * Pass comments all of them
             */

            'price1' => $priceSuggestion,

            /*
             * pass suggested deadline to the view
             */

            'deadlines' => $deadlines,

            'difference' => $interval,

            'price' => $question_price->question_price,

            'posted' => $posted,

            'answer_files' => $manuals_ans,

            'comments21' => $comments12,

            'count' => $count

        ]);
    }
    
    // count question matrices
    public function allcounts($userid)
    {
        // $user = DB::table('question_matrices')->where('email', '=', $user12) ->get();

    }

    public function increaseDeadline(Request $request, $question)
    {
        $quest = new SuggestDeadline;

        /*
         * Get the question ID
         * Insert using Eloquent
         * Get question ID
         */

        $quest->question_id = $question;

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->question_deadline= $request->input('question_deadline');

        /*
         * Getcomments bodyformthe post
         * create the post date
         */

        $quest->user_id = Auth::user()->email;
        $quest->save();

        return redirect()->route('view-question', ['question_id'=> $question]);

    }


    /*
     * Files data to database here I dream
     */

    public function Information(Request $request){


    }

    public function  PostComments(Request $request, $question){
        $comments_id = rand(1000, 9999);
        
        $path=  public_path().'/storage/uploads/'.$question.'/comments/'.$comments_id;
     
        $this-> FileUploads($request, $path);
            
        /*
         * Give comments an IDentificatiion Number
         */

        $path1 = '/storage/uploads/'.$question.'/comments/'.$comments_id;

        DB::table('post_comments')->insert(
            [
                'comment_body' => $request['comment_body'],
                'comments_id' =>$comments_id,
                'question_id' =>$question,
                'message_type'=>$request->commtype,
                'user_id' => Auth::user()->email,
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
        
        return redirect()->route('view-question', ['question_id'=> $question]);
    }
    
    /*
     * Use this function to update question status history
     */

    public function QuestionStatusHistory($database, $question,$mess){

            DB::table($database)->insert(
                [
                    'status' => $mess,
                    'question_id' =>$question,
                    'user_id' => Auth::user()->email,
                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

        return redirect()->route('view-question', ['question_id'=> $question]);

    }
    
    /*
     * Update status here 
     */
      
      public function FileUploads(Request $request, $path){

        /*
         * The state of the school
         */
          
         $file = Input::file('file');

          $dest = $path;

          

            foreach ($file as $files){

                $name =  $files->getClientOriginalName();

                $files->move($dest, $name);

            }
      }

    //Question Status

    /*
    public function  PostAnswer(Request $request, $question){

        //file uploads

        $file = Input::file('file');

        $dest = public_path().'/storage/uploads/'.$question.'/answer/';

            foreach ($file as $files){
                $name =  $files->getClientOriginalName();
                $files->move($dest, $name);
            }
            
        /*
         * Update the question status
         
            
            $this->UpdateQuestionStatus($request, $question);

        //Insert into database

       DB::table('post_answers')->insert(
            [
                'overdue' => '0',
                'question_id' =>$question,
                'user_id' => Auth::user()->email,
                'answered' => 1,
                'answer_body' => $request['answer_body'],
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

        //update status

        $this->Status($question, 'answered');

        return redirect()->route('view-question', ['question_id'=> $question]);

    }
    */

    public function questionAll()
    {
        /*
         * Quesry Database here for all questions
         */
        $questions = DB::table('post_question_models')->get();
        /*
         * return Question Blog
         */

        return view('questions.question-blog', ['question' => $questions]);
    }

    public function getAskQuestion()
    {
        /*
         * Select distinct form table Questions
         */

        return view('questions.ask-question');

    }
 
    public function askPriceDeadline(Request $request)
    {
        $username = Auth::user()->email;
        $question_id =  $value = session('question_id');

        return view('questions.ask-deadline',['username'=>$username, 'question_id'=> $question_id] );

    }

    public function viewQuestion(){

        return view('quest.question-det');
    }

        /*
         * use this to delete string
         */
    public static  function delete_all_between($beginning, $end, $string) {
        $beginningPos = strpos($string, $beginning);
        $endPos = strpos($string, $end);
        if ($beginningPos === false || $endPos === false) {
            return $string;
        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        return str_replace($textToDelete, '', $string);
        }

    /*
     * View Deadline post
     */

    public function postdeadlinePrice(){

      $academic_level = DB::table('academic_levels')
                      ->select('academic-level') 
                      -> get();

              return view('quest.ask-deadline-1',['category'=> $this->getQuestionCategories()]);
        }

    /*
     * Open View to post questions
     */
    public function getQuestionCategories(){
      $category = QuestionCategories::select('category')

                ->get();

        return $category;
    }


    public function postQuestions(){
        
        return view('quest.ask-question',['category' => $this->getQuestionCategories()]);
    }

    public function generateRandomString() {
        $length = 12;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
