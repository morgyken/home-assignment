<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserRegisterController extends Controller
{

   
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
        $request->validate([
        'name' => 'required|unique:posts|max:255',
        'email' => 'required',
        'password' => 'required|confirmed|min:5',
        'intro-text' => 'required|text'
        ]);


        //Register user 

        User::create([
            'name' => $data['name'],
            'email' => $data['email'], 
            'user_serial'=>$tutor_id,            
            'password' => bcrypt($data['password']),
            'intro-text' => $data['intro-text']
            
        ]);

        //User login 
        Auth::User();

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
        /*scanfold account when someone becomes a tutor

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
    
      //return value here 
        
    }

}
