<?php

namespace App\Http\Controllers;

use DB;

use Validator;

use Illuminate\Http\Request;

use App\User;
use Storage;


use App\question_body;

use App\Controllers\QuestionController;

use Illuminate\Support\Facades\Auth;

use Input;

class UserController extends Controller
{


  //view customer Controller



  public function ProfilePicView($view){

        if($view == 'profile'){
            return view('auth.profile-pic');
        }
        else{
            return view('auth.background-pic');
        }
  }

  public function profilePic($file){

    $path ='';
    $user_id = Auth::user()->id;   

    $path = public_path().'/uploads/profile/'.$user_id.'/';

    $rules = array('file' => 'required|max:10000|mimes:png,jpg, jpeg,bmp' );

    $validator = Validator::make(Input::all(), $rules);

    $file = Input::file($file);

    if(is_array($file)){

        foreach ($file as $files){

            $name =  $files->getClientOriginalName();

             $files->move($path, 'profile-pic.jpg');
            }
        }
    return redirect()->route('home');
    }


    public static function CustomerId($question, $database)
    {
        //use the qestion to get the data

           $data = DB::table($database)->where('question_id', $question)->first();


           if($data !=null)
           {
             $user = DB::table('users')->where('email', $data->user_id)->first();

             return $user->id;
           }
           else
           {
            return '';
           }

         }

         //return tutor id here

    public static function TutorId($question, $database)
    {
        //use the qestion to get the data

           $data = DB::table($database)
                   ->select('tutor_id')
                   ->where('question_id', $question)->first();


           $userId = User::select('serial')->where('email', $data->tutor_id)->first();

          return $userId->serial;
    }

        public static function TutorEmail($question, $database)
    {
        //use the qestion to get the data

           $data = DB::table($database)
           ->select('tutor_id')
           ->where('question_id', $question)->first();

            return $data->email;

    }



    public static function CustomerEmail($question, $database)
    {
        //use the qestion to get the data

           $data = DB::table($database)->where('question_id', $question)->first();


           if($data !=null)
           {
             $user = DB::table('users')->where('email', $data->user_id)->first();

             return $user->email;
           }
           else
           {
            return '';
           }

         }
    }
