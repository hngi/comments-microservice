<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function deleteComment(Request $request)
    {
    }

    /**
     * Delete comment from database
     * @param array $request email,
     * @param int $id comment id
     * @return json result of opperation
     */
    public function delete(Request $request, $id)
    {
        //ensure email is passed
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        // get user id
        $User = User::select('id')->where('email', $request['email'])->first();

        // check if user id is returned
        if ($User) {

            // search for comment
            $comment = Comment::find($id);

            // check if comment is found
            if (!$comment) {
                return response()->json([
                    'message' => 'Comment Not Found',
                    'response' => 'error',
                ], 400);
            }

            // check if user owns comment
            if ($comment['user_id'] != $User['id']) {
                return response()->json([
                    'message' => 'Unathorized User',
                    'response' => 'error',
                ], 401);
            }

            // delete comment
            $comment->delete();
            return response()->json([
                'data' => ['comment' => ['id', $id]],
                'message' => 'Comment deleted successfully',
                'response' => 'Ok'
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid User',
            'response' => 'error',
        ], 400);
    }

    public function generateDummyData()
    {
        //create user for tweeter user
        $user1 = new User();
        $user1->name = 'anonymoous User';
        $user1->email = 'no email' . time();
        $user1->save();

        $user2 = new User();
        $user2->name = 'Registered User';
        $user2->email = 'demo@email.com';
        $user2->save();

        $comment1 = new Comment();
        $comment1->user_id = $user1->id;
        $comment1->comment_body = 'The money is small';
        $comment1->comment_origin = 'Twitter';
        $comment1->save();

        $comment2 = new Comment();
        $comment2->user_id = $user2->id;
        $comment2->comment_body = 'This is a welcome development ...';
        $comment2->comment_origin = 'Twitter';
        $comment2->save();

        return response()->json(['job completed'],200);
    }
}
