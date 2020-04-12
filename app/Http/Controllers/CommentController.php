<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //add comment
    public function add(Request $request){

        try{
            //Get all inputs
            $data = $request->post();
            
            $v = \Validator::make($data, [
                'comment' => 'required',
            ]);
        
            if ($v->fails())
            {
                return redirect()->back()->withErrors($v->errors());
            }

            // Save In Database
            $comment= new Comment();
            
            $comment->user_id      = \Auth::user()->id;
            $comment->film_id      = $data['film_id'];
            $comment->comments     = $data['comment'];
            $comment->save();

            return redirect("films/".$data['film_slug']);
         //catch exception
        }catch(\Exception $e){
            return redirect()->back()->withErrors("Unable to add comment!!");
        }    
        
    }
}
