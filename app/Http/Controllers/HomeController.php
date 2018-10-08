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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
       public function index($params = null)
    {

      //Get user 
      $user = DB::table('users')->where('email', Auth::user()->email) ->first();

      //get user role 
            
            $role = $user->user_role;

            //initialize object 


//if customer 
       if($role == 'cust'){

            $questions =  DB::table('question_bodies')
            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')        
            
            ->where('question_bodies.user_id', '=', Auth::user()->email)
            ->orderBy('question_bodies.created_at', 'desc')
            ->paginate(25); 

          }

//if tutor 
      if($role == 'tutor'){

          if($params == null)
          {
            $questions =  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')  

            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')


            ->where('question_matrices.status', '=','new')

            ->orwhere('question_matrices.status', '=','active')

            ->orwhere('question_matrices.status', '=',1)

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(25);


          }

          else{
            $questions =  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')  

            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status', '=', $params)

            ->where('question_matrices.user_id', '=', Auth::user()->email)

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(25);

          }             

          }
            

       if(Auth::check())
       {     
        if($role ='admin') 
          {
               return view ('admin.dashboard',
                   [
                    'user' => $user,               
                    'role' => $role

                 ]);

          } 
          else{
            return view ('layouts.index-template',
             [
              'user' => $user,
              'questions' => $questions,
              'role' => $role

           ]);

          }         

           
                    
       }
       else{
            return redirect()-> route('general');
       }
    }

    public function index2(){   
      
     return view ('gen.landing');
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
                               
                return view ('quest.ask-deadline-last', ['user' => $user, 'role' => $role]);
            }
            
       }
       else{
            return redirect()-> route('general');
       }
    }




    public function test2 ()
    {
     $questions =  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')  

            ->join(
              'question_matrices', 'question_details.question_id', '=', 
              'question_matrices.question_id'
          )

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(25);

    

      return view('admin.questions', ['questions'=> $questions]);    

    }

    
}
