<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use DB;

class HomeController extends Controller  
{

  private $user;


  private $role;

  private $questions;


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
      $user1 = Auth::User();



      $this->role =$user1['user_role'];

      //$user = $user1['user']; 


       if($this->role == 'cust'){

            $questions =  DB::table('question_bodies')
            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')
             ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')
            
            ->where('question_bodies.user_id', '=', Auth::user()->email)
            ->orderBy('question_bodies.created_at', 'desc')
            ->paginate(25); 

          }


//if tutor 
      if($this->role == 'tutor'){

          if($params == null)
          {
            $questions =  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')  

            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status','=', 'new')

            ->orwhere('question_matrices.status','=', 'reassined')

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(35);


          }

          else{
            $questions =  DB::table('question_bodies')

            ->join('question_details', 'question_bodies.question_id', '=', 'question_details.question_id')  

            ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id')

            ->where('question_matrices.status', '=', 'new')

            ->where('question_matrices.user_id', '=', Auth::user()->email)

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(25);

          }             

          }

          if(Auth::check())
       {     
        if($this->role=='admin') 
          {
               return view ('admin.dashboard',
                   [
                    'user' => $user1,               
                    'role' => $this->role

                 ]);

          } 
          else{
            return view ('layouts.index-template',
             [
              'user' => $user1,
              'questions' => $questions,
              'role' => $this->role

           ]);

          }         
          
                    
       }
       else{
            return redirect()-> route('general');
       }
    }


 public function getQuestionPrice()
    {
       $user1 = Auth::User();

      $this->role =$user1['user_role'];

       if(Auth::check())
       {
          
            if($this->role == 'cust'){
                                               
                return view ('quest.ask-deadline-last', ['user' => $user1, 'role' => $this->role]);
            }
            
       }
       else{
            return redirect()-> route('general');
       }
    }


    public function getTutProfile()
    { 
        $tutor  = session('email');

        $tutor_profile = DB::table ('tutor_accounts')

                        ->where('tutor_id', $tutor)

                        ->first();

        if($tutor_profile != NULL) 
        {
          return view ('tut.tut-profile', $this->GetUser(), 

                        ['tutorprofile' => $tutor_profile]);
        }   
        else
        {
          return view ('tut.tut-profile', $this->GetUser());
        }          
              
    }

    public function getUser()
    {
      //init user 
        $user = DB::table('users')->where('email', Auth::user()->email) ->first();

        //define role 

        $role =  $user->user_role;

        $array = array('user' => $user, 'role' => $role);

        return $array;


    }   

    public function viewTutorPayment()
    {

      $payment_date = \Carbon\Carbon::parse('this sunday')->toDateString();

      //$number_of_orders = DB::table('')->get();

      return view ('admin.tutor-payments', ['paydate' => $payment_date]);
    }


    //completed Questions 


  
}
