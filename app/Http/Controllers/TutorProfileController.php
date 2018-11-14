<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\User;

use App\TutorAccount;

use Exception;

use App\Http\Controllers\UserController;

use Illuminate\Database\MySqlConnection;

use App\question_body;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class TutorProfileController extends HomeController
{     

//post tutor profile
     public function postTutProfile(Request $request)
    { 
        $category = array($request->aofeexp1,$request->aofeexp2, $request->aofeexp3, $request->aofeexp4, $request->aofeexp5,$request->aofeexp6,$request->aofeexp7,$request->aofeexp8,$request->aofeexp9,$request->aofeexp10,$request->aofeexp11,$request->aofeexp12,$request->aofeexp13,$request->aofeexp14,$request->aofeexp15,$request->aofeexp16,$request->aofeexp17,$request->aofeexp18,$request->aofeexp19,$request->aofeexp20,$request->aofeexp21);

        //input files here 

        $categories = json_encode($category);

        $file = Input::file('collegeCert');

         $dest = public_path().'/storage/uploads/'.Auth::user()->id.'/certs/';

         // upload the certificates 
          $file_upload = $this->fileInput($file, $dest);

        //Input profile picture 

        $userProfile = new UserController(); //instance of user controller 

        //Pick file input 

        $file_file = Input::file('profilepic');
       
       
        //save the profile picture

        $userProfile-> profilePic($file_file);

        //post tutor profile
        DB::table('tutor_accounts')->where('tutor_id', Auth::user()->email)
            ->update(
                [    
                    
                    'firstname'     => $request->firstname,
                    'lastname'      => $request->lastname,
                    'skype'         => $request->skype,
                    'phoneno'       => $request->phoneno,
                    'town'          => $request->town,
                    'county'        =>$request->county,
                    'categories'    =>$categories,
                    'payment_method'=> $request->payment_method,
                    'account_status' =>'Active',
                    'account_level' => 'New',
                    'payment_account' =>  $request->payment_account,
                    'created_at'    =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

            //update user table 
    //get the old pasword amd compare 

        $pass = DB::table('users')->select('password')->where('password', $request->oldpassword)->first();

        if($pass != NULL)
        {
    
    //post tutor profile
        DB::table('user')->where('email', Auth::user()->email)
            ->update(
                [    
                    'password'     => $request->password,
                    'created_at'    =>\Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at'    => \Carbon\Carbon::now()->toDateTimeString(),
                ]);

        }       

         return redirect()->route('tut-profile', $this->GetUser());
        } 

    public function getTutProgress()
    {  
        return view ('adm.show-tut-progress-det', $tutor_profile);

    }
     

//post tutor profile
     public function postTutProgress(Request $request)
    { 
        

    }

    //function to help in selecting single column 
    public function singleSelectHelper(){

        return DB::query()->macro('firstOrFail', function () {
            if ($record = $this->first()) {

                return $record;
        }

            throw new Exception('No records found');
        });
    }

    public function getTutAccount()
    {    
        $this->singleSelectHelper();  
        

        $data = DB::table('tutor_accounts')->where('tutor_id', Auth::user()->email)->firstOrFail();       

     return view ('tut.tut-profile', ['data'=> $data]);

    } 

    public function fileInput($file, $dest){

        if(is_array($file)){

             foreach ($file as $files){
                /*
                 * loop through multiple files
                 */
                $name =  $files->getClientOriginalName();
                $files->move($dest, $name);
            }

        }

    } 


}
