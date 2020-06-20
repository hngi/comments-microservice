<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//create twitter comment
Route::post('/tweet/comment/create', ['uses' => "TwitterCommentsController@tweetComments"]);

//create comment
Route::post('/report/{report_id}/comment/create', ['uses' => "CommentsController@createComment"]);

//edit comment
Route::patch('report/comment/edit/{id}', 'CommentsController@update');

// delete comment
Route::delete('report/comment/{comment_id}', 'CommentsController@delete');

// upvote/downvotes
Route::patch('/report/comment/vote/{comment_id}', ['uses' => 'CommentsController@vote']);

//upvote/downvote reply
Route::patch('report/comment/reply/vote/{reply_id}', ['uses' => 'RepliesController@vote']);

//generate dummy users and comments
Route::get('/dummy-data','CommentsController@generateDummyData');

//Get a comments on a report
Route::get('report/{report_id}/comments', 'CommentsController@getSingleCommentsOnReport');

