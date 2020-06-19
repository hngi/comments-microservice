<?php

namespace App\Http\Controllers;
use App\Comment;

class GetCommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getAllComments() {
        //get all comment here 
        $comments = Comment::get()->toJson(JSON_PRETTY_PRINT);
        return response($comments, 200);
    }
}
