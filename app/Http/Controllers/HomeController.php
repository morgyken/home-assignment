<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       // return view('');

       if(Auth::check())
       {
            $user =  User::where('email', Auth::user()->email) ->first();
            $role = $user->user_role;

            if($role == 'cust'){
                return view ('cust.cust-dashboard12');
            }
            if($role == 'tut'){
                return view ('tut.home');
            }
            if($role == 'mod'){
                return view ('admin1.home');
            }
            if($role == 'admin'){
                return view ('admin2.home');
            }
            if($role == 'main'){
                return view ('cust.home');
            }
       }
    }
}
 