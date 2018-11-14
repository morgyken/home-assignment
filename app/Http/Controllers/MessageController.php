<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Auth;

use App\MessagesModel;

class MessageController extends Controller
{

   

public function PostMessages(Request $request){

        DB::table('messages_models')->insert(
            [      
                'message' => $request->text,
                'question_id' => $request->qid,
                'role' => Auth::user()->user_role,
                'user' => Auth::user()->email,                
                'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);

        return redirect()->back()->withInput(['tab' =>'chatpanel']) ;
    }
     
    public function delete(Request $request){    

        MessagesModel::where('id', $request->id) ->delete();   
                   
        return redirect()->route('question_det', ['question_id' =>$request->qid,]);    
    }

    public function update(Request $request){    

        $item = ItemModel::find($request->id); 

        $item->message =$request->text;
        
        $item->save();

        return redirect()->route('question_det', ['question_id' =>$request->qid,]);     
    }


}

