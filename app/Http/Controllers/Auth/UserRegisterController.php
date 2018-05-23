<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserRegisterController extends Controller
{
    
  

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',           
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', 
        
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        $tutor_id = rand (99999,999999);
       
       //validate data
        


        //Register user 

        //User Logs are here 

         DB::table('tutor_education')->insert(
            [
                'tutor_id'          =>  $data['email'],         
                'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()

            ]);

        //update tutor profie accounts 
        DB::table('tutor_profile')->insert(
            [
                'tutor_id'          =>  $data['email'],         
                'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()

            ]);

        //update tutor accounts

         DB::table('tutor_accounts')->insert(
            [
                'account_id'        =>  rand(89000,999999), 
                'tutor_id'          =>  $data['email'],         
                'account_status'    => 'New',
                'account_level'     => 'Beginner',
                'created_at'        =>  \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'        =>  \Carbon\Carbon::now()->toDateTimeString()

            ]);

        
    
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_role' => $data['user_role']
            
        ]);



        
    }

}
