<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use DB;

class HomeController extends Controller  
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
       public function index()
    {

      $questions =  DB::table('question_bodies')
            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')        
            
            ->where('question_details.user_id', '=', Auth::user()->email)
            ->orderBy('question_bodies.created_at', 'desc')
            ->paginate(25); 


       if(Auth::check())
       {
            $user =  User::where('email', Auth::user()->email) ->first();
            
            $role = $user->user_role;

            if($role == 'cust'){
                $user =  User::where('email', Auth::user()->email)->first();
                               
                return view ('layouts.index-template',
                 [
                  'user' => $user,
                  'questions' => $questions

               ]);
            }
            
       }
       else{
            return redirect()-> route('general');
       }
    }




    public function getAskQuestions(){

           $user = session('user');  //get user roles from the sessions 
        
        
            return view ('quest.ask-question-12', ['user' =>$user]);
    }

    public function AskSample(){

        $user = session('user');  //get user roles from the sessions 
          
         return view ('quest.part.ask1', ['user' =>$user]);
 }

 public function getQuestionPrice()
    {
       if(Auth::check())
       {
            $user =  User::where('email', Auth::user()->email) ->first();
            
            $role = $user->user_role;

            if($role == 'cust'){
                $user =  User::where('email', Auth::user()->email)->first();
                               
                return view ('quest.ask-deadline-last', ['user' => $user]);
            }
            
       }
       else{
            return redirect()-> route('general');
       }
    }

    
}
