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
 
            ->where('question_matrices.status', '=', $params)

            ->where('question_matrices.tutor_id', '=', Auth::user()->id)

            ->orderBy('question_bodies.created_at', 'desc')

            ->paginate(25);

          }             

          }

          $success = $this->successRate();

          $sus = $this->GetSuspensions();

          $plag= $this->GetPlagiarism();

        //  dd($success);

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
              'user'          => $user1,
              'questions'     => $questions,
              'role'          => $this->role,
              'success'       => $success,
              'suspension'    => $sus,
              'plag'          => $plag,
              'next_payment'   =>$this->NextPayments(),
              'total_earned'  =>$this->TotalEarnedAmount(),
              'current_amount' => $this->CurrentEarnedAmount()

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


   //Find sum of the total amount to be paid

       public function NextPayments()
    {
    //completed Questions 

      $sumOfCurrent = DB::table('question_details')

                      ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id') 

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'Rated')

                        ->orwhere('status', 'rated')

                        ->whereDate('question_matrices.updated_at', '>', \Carbon\Carbon::today()->subDays(14)->toDateString())

                         ->whereDate('question_matrices.updated_at', '<', \Carbon\Carbon::today()->subDays(7)->toDateString())

                        ->sum('tutor_price');

          
          return $sumOfCurrent;

    }



//Find sum of the total amount already earned

       public function TotalEarnedAmount()
    {
    //completed Questions 

      $sumOfCurrent = DB::table('question_details')

                      ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id') 

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'Rated')

                        ->orwhere('status', 'rated')

                        ->whereDate('question_matrices.updated_at', '<', \Carbon\Carbon::today()->subDays(14)->toDateString())

                        ->sum('tutor_price');

          return $sumOfCurrent;

    }

    //Find sum of the total amount already earned// to be adjusted to 2

       public function CurrentEarnedAmount()
    {
    //completed Questions 

      $sumOfCurrent = DB::table('question_details')

                      ->join('question_matrices', 'question_details.question_id', '=', 'question_matrices.question_id') 

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'Assigned')

                        ->orwhere('status', 'assigned')

                        ->whereDate('question_matrices.updated_at', '>', \Carbon\Carbon::today()->subDays(7)->toDateString())

                        ->sum('tutor_price');

          return $sumOfCurrent;

    }


    //success rate

    public function successRate()
    {

    

      //completed Questions 

      $completed = DB::table('question_history_tables')

                        ->distinct('question_id')

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'Rated')

                        ->orwhere('status', 'rated')

                        ->orwhere('status', 'answered')

                        ->get();

        $completed = $completed->count();


      $current = DB::table('question_history_tables')

                        ->distinct('question_id')

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'assigned')

                        ->orwhere('status', 'revision')

                        ->orwhere('status', 'Assigned')

                        ->get();

        $current = $current->count();


        $other = DB::table('question_history_tables')

                        ->distinct('question_id')

                        ->where('user_id', Auth::user()->id)

                        ->where('status', 'reassined')

                        ->orwhere('status', 'Reassined')

                        ->orwhere('status', 'widthdrawn')

                        ->get();


        $other = $other->count();

         $results = array(
                            'current' => $current, 
                            'other' =>  $other,  
                            'completed' =>  $completed
                          );
        
        return $results;

    }

    //get suspensions

    public function GetSuspensions()
    {
      $suspension = DB::table('suspension_models')
                    ->select('mode')
                    ->where('mode', 'suspension')
                    ->get();

      $suspension = $suspension->count();

      return $suspension;
    }

    public function GetPlagiarism()
    {
      $plag = DB::table('suspension_models')
                    ->select('mode')
                    ->where('mode', 'plagiarism')
                    ->get();

      $plag = $plag->count();

      return $plag;
    }


public function GetWidthdrawn()
    {
      $plag = DB::table('suspension_models')
                    ->select('mode')
                    ->where('mode', 'widthdrawn')
                    ->get();

      $plag = $plag->count();

      return $plag;
    }

    //Post suspension via Kennel

    public function PostSuspension()
    {
      $tutor = DB::table('question_history_tables')
              ->select('user_id')
              ->where('status', 'Reassigned')
              ->orwhere('status', 'Widthdrawn')
              ->whereDate('created_at', '>', \Carbon\Carbon::today()->subMonth()->toDateString())
              ->get();

      //change obect to array

      $tutor = (array) $tutor;

      if($this->GetWidthdrawn() > 2 || $this->GetPlagiarism() > 2 ){

      foreach ($tutor as $key => $value) {

        DB::table('suspension_models')->insert(
                [
                    'tutor_id' => $value,

                    'mode' => 'suspended',

                    'user_id' => Auth::user()->id,

                    'message' => 'The user has been suspended for Poor Quality',

                    'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                    
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ]);
     
      }

      }
      

    }


  
}
