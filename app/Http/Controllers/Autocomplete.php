<?php

namespace App\Http\Controllers;
use App\UniversityModels;
use App\AcademicLevel;
use App\QuestionCategories;
use DB;
use App\User;

use Illuminate\Http\Request;

class Autocomplete extends Controller
{
    public function Universities(Request $request)
    {

    $term= $request->term;

    $data = UniversityModels::where('university_name', 'LIKE', '%'.$term.'%')
    //$data = UniversityModels::
    		->take(8)

		    ->get();

    $result = array();

    foreach ($data as $key => $value) {
    	# code...
    	$result []= ['id' =>$value->id, 'value' => $value->university_name];
    }

   	
   	return response()->json($result);      	

    }

    public function Tutor(Request $request)
    {

    $term= $request->term;

    $data = User::where('email', 'LIKE', '%'.$term.'%')
    //$data = UniversityModels::
            ->take(8)

            ->get();

        dd($data);

    $result = array();

    foreach ($data as $key => $value) {
        # code...
        $result []= ['id' =>$value->id, 'value' => $value->email];
    }

    
    return response()->json($result);       

    }

    public function OrderSubject(Request $request)
    {

    $term= $request->term;

    $data =QuestionCategories::where('category', 'LIKE', '%'.$term.'%')
    //$data = UniversityModels::
            ->take(10)

            ->get();

    $result = array();

    foreach ($data as $key => $value) {
        # code...
        $result []= ['id' =>$value->id, 'value' => $value->university_name];
    }

    
    return response()->json($result);       

    }

    public function AcademicLevel(Request $request){

    	$term= $request->term;

	    $data = AcademicLevel::where('academic_level', 'LIKE', '%'.$term.'%')
	    //$data = AcademicLevel::take(5)
	    		->take(9)

			    ->get();

	    $result = array();

	    foreach ($data as $key => $value) {
	    	# code...
	    	$result []= ['id' =>$value->id, 'value' => $value->academic_level];
	    }



	   	
	   	return response()->json($result);    

    }
}
