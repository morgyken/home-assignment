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
use App\TutorAccount;

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

       //init pofile 
       $id = DB::table('tutor_accounts')->max('id');

       if($id == null)
       {
        $id = 1;
       }
       else 
       {
        $id = $id + 1;
       }


       $tutor_account = new TutorAccount();

       $tutor_account->tutor_id = $request['email'];

       $tutor_account->id =$id;

        $tutor_account->account_id = rand(99900,999000);

       $tutor_account -> save();

       //end of init tutor account 
                //User login 
      if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password
      ]))
      {
        session(['email' => $request['email']]); //save emai in the sesion 

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
