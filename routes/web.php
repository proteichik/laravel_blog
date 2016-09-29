<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){

    Route::get('/', [
            'as' => 'admin.home',
            'uses' => 'Admin\PostController@listAction'
    ]);

    Route::get('/posts/new', [
        'as' => 'admin.posts.new',
        'uses' => 'Admin\PostController@showCreateForm'
    ]);

    Route::post('/posts/new', [
        'as' => 'admin.posts.new.save',
        'uses' => 'Admin\PostController@createAction'
    ]);
    
});

