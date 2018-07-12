<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

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
       if(Auth::check())
       {
            $user =  User::where('email', Auth::user()->email) ->first();
            
            $role = $user->user_role;

            if($role == 'cust'){
                $user =  User::where('email', Auth::user()->email)->first();
                               
                return view ('cust.customer-home1', ['user' => $user]);
            }
            
       }
    }

    
}
