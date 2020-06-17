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
        $tweetComment = 'bla bal bla blaal';
        //create user for tweeter user
        $user = new User();
        $user->name = 'Tweeter User' ;
        $user->email = 'no email'. time();
        $save = $user->save();

        if ($save){
            $tweets = new Comment();
            $tweets->user_id = $user->id;
            $tweets->comment_body = $tweetComment;
            $tweets->comment_origin = 'Twitter';
            $saveComment = $tweets->save();

            if ($saveComment) {
                return response($content = [
                    'data' => [],
                    'message' => 'Comment saved successfully',
                ],
                $status = 201);
            }else {
                return response($content = [
                    'message' => 'Cannot save comment',
                    'error',

                    ]);
            }

        } 

        return response($content = ['message' =>'Error could not save user']);

        
    }

    //
}
