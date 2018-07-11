<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    use AuthenticatesUsers;
   
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        $tutor_id = rand (99999,999999); //user serial      
       //validate data       
        $this->validate($request, [
        'name' => 'required|unique:users|max:255',
        'email' => 'required',
        'password' => 'required|confirmed|min:5',
        'intro-text' => 'required|string'
        ]);
     
        //Register user 

        User::create([
            'name' => $request['name'],
            'email' => $request['email'], 
            'user_serial'=>$tutor_id,            
            'password' => bcrypt($request['password']),
            'intro-text' => $request['intro-text']
            
        ]);

          /*scanfold account when someone becomes a tutor

              //update tutor education table with the data

         DB::table('tutor_education')->insert(
            [
                'user_serial'          =>  $tutor_id,         
                'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()

            ]);


        //update tutor profie accounts 
        DB::table('tutor_profile')->insert(
            [
                'user_serial'          =>$tutor_id,         
                'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()

            ]);

        //update tutor accounts
      

         DB::table('tutor_accounts')->insert(
            [
                'account_id'        =>  rand(89000,999999), 
                'user_serial'          =>  $data['email'],         
                'account_status'    => 'New',
                'account_level'     => 'Beginner',
                'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()

            ]);        

            */
      //User login 
      if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
      ]))
      {
        return redirect()->route('home');
      }
      else
      {
        dd('user not logged i9n');
      }     
    
    }
}
