<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    
    public function getFiles($path)
    {
 			$files  = [];

            $filesInFolder = \File::files($path);

            //upload files to the path required 

            foreach($filesInFolder as $path)
            {
                $files[] = pathinfo($path);
            }

           return $files;
    }

    public function UploadFiles($file, $dest)
    {
    	if(is_array($file)){

                foreach ($file as $files){
                    /**
                     * loop through multiple files
                     */

                    $name =  $files->getClientOriginalName();
                    $files->move($dest, $name);
                }
    }
 }
}//