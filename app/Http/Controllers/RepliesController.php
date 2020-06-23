<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RepliesController extends Controller
{
    public function vote(Request $request, $reply_id)
    {
        $this->validate($request, [
            'vote_type' => 'required|string'
        ], [
            'required' => [
                'message' => 'vote_type is required',
                'response' => 'error',
            ],
            'string' => [
                'message' => 'vote_type must be either upvote or downvote',
                'response' => 'error',
            ]
        ]);

        if (!$request->has('vote_type')) {
            return response()->json([
                'message' => 'vote_type is required',
                'response' => 'error',
            ], 400);
        }

        if (!is_numeric($reply_id)) {
            return response()->json([
                'message' => 'Reply not found',
                'response' => 'error',
            ], 400);
        }

        $reply = Reply::find($reply_id);

        // check if reply is found
        if (!$reply) {
            return response()->json([
                'message' => 'Reply Not Found',
                'response' => 'error',
            ], 400);
        }

        $voteType = $request->input('vote_type');

        if ($voteType === 'upvote') {
            $reply->upvote += 1;
            $reply->vote   += 1;
            $save = $reply->save();
        } elseif ($voteType === 'downvote') {
            $reply->downvote  += 1;
            $reply->vote      += 1;
            $save = $reply->save();
        } else {
            return response()->json([
                'message' => 'invalid vote_type',
                'response' => 'error',
            ], 400);
        }

        if ($save) {
            return response()->json([
                'data' => [$reply],
                'message' => 'Reply voted successfully',
                'response' => 'Ok'
            ], 200);
        }
    }

    public function createReply(Request $request)
    {
        //validate request
        $validate = validator([
            'comment_id' => 'required',
            'reply' => 'required'
        ]);

        if (!$validate) {
            return response(
                $content = [
                    'message' => 'comment_id is Required',
                    'response' => 'error',
                ],
                $status = 404
            );
        }

        $request = json_decode($request->getContent());

        //create replies;
        $reply = new Reply();
        $reply->reply = $request->reply;
        $reply->comment_id = $request->comment_id;
        $saveReply = $reply->save();

        if ($saveReply) {
            return response(
                $content = [
                    'data' => [$reply],
                    'message' => 'Reply created successfully',
                    'response' => 'Ok'
                ],
                $status = 201
            );
        } else {
            return response(
                $content = [
                    'message' => 'Cannot save reply',
                    'response' => 'error',
                ],
                $status = 400
            );
        
        } 
            
    }
}

