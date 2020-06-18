<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function updateComment($id, Request $request)
    {
        //Do simple validation to validate the request
        $this->validate($request, [
            'author_email' => 'required',
            'content' => 'required'
        ]);

        //Extract the User Email which is used for the comment with an id of $id value
        $comment = DB::table('comments')->find($id);
        $original_comment = response()->json($comment);
        $db_email = $original_comment->original->author_email;

        //Get Email from the request
        $email = $request->input("author_email");
        $content = $request->input("content");

        //check whether the emails are not equal
        if ($email !== $db_email) {
            //Set Error Message
            $message = ["status" => 400, "data" => "Please enter the email you used to comment"];
            //Return Error message if the emails are not equal
            return response()->json($message);
        }

        //Update the Comment if they are equal
        $affected = DB::table('comments')->where('id', $id)->update(['content' => $content]);
        //Set Success Message
        $message = ["status" => 200, "data" => "Comment updated successfully"];
        //Return a success message
        return response()->json($message);
    }

}
