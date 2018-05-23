<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   /// protected $redirectTo = '/all-questions';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    pblic function login( Request $request){
      if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password

      ]))
      {
       $user =  User::where('email', $request-> email) ->first();

           if($user->user_role ='admin')
           {
               if($user->user_level =='admin1')
               {
                return redirect()->route('admin1');
               }

               if($user->user_level ==='Qa')
               {
                return redirect()->route('admin-qa');
               }

               if($user->user_level =='billing')
               {
                return redirect()->route('billing');
               }
               if($user->user_level =='bidder')
               {
                return redirect()->route('bidder');
               }
               else 
               {
                return redirect()->route('support');
               }
               
           }

            if($user->user_role == 'cust')
           {
               return redirect()->route('customer');
           }

            if($user->user_role == 'tut')
           {
              return redirect()->route('tutor');
           }           

      }
    }
}
