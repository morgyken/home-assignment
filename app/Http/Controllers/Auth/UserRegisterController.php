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

use App\RandomNames;


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

     // dd($request->sex);
      //get random name 

      $name = $this->GenerateRandomName($request->sex);

       $tutor_id = rand (99999,999999); //user serial      
       //validate data       
        $this->validate($request, [

          'name' => 'required|max:255',

          'email' => 'required',

          'password' => 'required|min:5',

          'sex' => 'required'         

        ]);
     
        
       $user =  User::create([

            'name' => $request['name'],

            'email' => $request['email'], 

            'user_name' => $name,

            'sex' => $request->sex,

            'user_serial'=>$tutor_id,

            'password' => bcrypt($request['password']),
            
            
        ]);
          
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
        return "User not fund!";
      }
    
    }

    //get random Name 

    public function GenerateRandomName($sex)
    {

      //$sex = 'other';

      if($sex == 'other')
      {
         $name = RandomNames::inRandomOrder()->select('name')->take(2)->get()->toArray();
      }
      else {

        //get results as an array

         $name = RandomNames::inRandomOrder()->select('name')
                   ->where('sex', $sex)->take(2)->get()->toArray();
    }    

   // dd($name);

      $name = $name[1]['name'].'-'.$name[0]['name'];

  
      return  $name;

    }
}
