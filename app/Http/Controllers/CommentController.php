<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Animal $animal, Request $request){

        $validation = $request->validate([
            "title" => 'required',
            'comment'=> 'required',
        ]);

        Comment::create([
            "title" => $request->title,
            "comment" => $request->comment,
            "user_id" => Auth::user()->id,
            "animal_id" => $animal->id,
        ]);
        

        return back()->with("success","Comment created");
    }

    public function destroy(Animal $animal, Comment $comment){
        $comment->delete();
        return back()->with("success","Comment deleted");
    }

}
