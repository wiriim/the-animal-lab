<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Animal $animal, Request $request){

        $validation = $request->validate([
            "title" => 'required',
            'comment'=> 'required| max:1200',
        ]);

        Comment::create([
            "title" => $request->title,
            "comment" => $request->comment,
            "user_id" => Auth::user()->id,
            "animal_id" => $animal->id,
        ]);


        return redirect('/animals/'.$animal->id.'#comment')->with("success","Comment created");
    }

    public function destroy(Animal $animal, Comment $comment){
        $user = Auth::user();
        if (Gate::allows('isAdmin', $user) || Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return redirect('/animals/'.$animal->id.'#comment')->with("success", "Comment deleted");
        }
        return redirect('/animals/'.$animal->id.'#comment')->with("error", "Unauthorized action");
    }

}
