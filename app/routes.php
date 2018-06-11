<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/** application routes */
Route::get('/', 'TodoController@getTodos');


/** API routes */
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('todos', 'ApiController');
});