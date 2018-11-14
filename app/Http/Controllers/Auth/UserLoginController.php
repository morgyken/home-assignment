<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\Auth\Session;
use DB;

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

    public function login( Request $request){
       // dd($request->email);
      
    if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
      ]))
      {
     
       $user =  User::where('email', $request->email)->first();
            
       $role = $user->user_role;

       $user_id = $user->email;

       session(['user' => $user, 'role' => $role, 'email' =>  $request->email]);

       DB::table('login_metas')->insert(
            [
                'tutor_id' =>$user_id,

                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

       
       //redirect differently for every user.
       
       return redirect()->route('home');
      }
      else {
      return redirect()->route('general');
    }
    }


}
