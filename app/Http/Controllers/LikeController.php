<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Comment $comment){
        $user = Auth::user();
        $user ->likes()->attach($comment->id);
        return back();
    }

    public function dislike(Comment $comment){
        $user = Auth::user();
        $user ->likes()->detach($comment->id);
        return back();
    }
}
