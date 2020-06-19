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

// delete comment
Route::delete('/comments/{id}', 'CommentsController@delete');

//generate dummy users and comments
Route::get('/dummy-data','CommentsController@generateDummyData');

