<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;

class TwitterCommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweetComments()
    {

        //call twitter API
        //get user comments
        $tweetComment = '';
        //create user for tweeter user
        $user = new User();
        $user->name = 'Tweeter User' ;
        $user->email = 'no email'. time();
        $save = $user->save();

        if ($save){
            exit;
            $tweets = new Comment();
            $tweets->user_id = $user->id;
            $tweets->comment_body = $tweetComment;

        } 

        return response($content = 'Error could not save user');

        
    }

    //
}
