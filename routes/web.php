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

Route::post('/tweet/comment', ['uses' => "TwitterCommentsController@tweetComments"]);

//edit comment
Route::put('report/comment/{id}', 'CommentsController@update');

// delete comment
Route::delete('report/comment/{id}', 'CommentsController@delete');

//generate dummy users and comments
Route::get('/dummy-data','CommentsController@generateDummyData');

