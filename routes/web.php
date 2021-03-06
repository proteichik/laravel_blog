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
            'as' => 'admin.posts',
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

    Route::get('/posts/{id}', [
        'as' => 'admin.posts.edit',
        'uses' => 'Admin\PostController@showUpdateForm'
    ])->where('id', '[0-9]+');

    Route::post('/posts/{id}', [
        'as' => 'admin.posts.edit.save',
        'uses' => 'Admin\PostController@updateAction'
    ])->where('id', '[0-9]+');

    Route::post('/posts/delete/{id}', [
        'as' => 'admin.posts.delete',
        'uses' => 'Admin\PostController@deleteAction'
    ])->where('id', '[0-9]+');
    


    Route::get('/categories', [
        'as' => 'admin.categories',
        'uses' => 'Admin\CategoryController@listAction',
    ]);

    Route::get('/categories/new', [
        'as' => 'admin.categories.new',
        'uses' => 'Admin\CategoryController@showCreateForm',
    ]);

    Route::post('/categories/new', [
        'as' => 'admin.categories.new.save',
        'uses' => 'Admin\CategoryController@createAction',
    ]);

    Route::get('/categories/{id}', [
        'as' => 'admin.categories.edit',
        'uses' => 'Admin\CategoryController@showUpdateForm',
    ])->where('id', '[0-9]+');

    Route::post('/categories/{id}', [
        'as' => 'admin.categories.edit.save',
        'uses' => 'Admin\CategoryController@updateAction',
    ])->where('id', '[0-9]+');

    Route::post('/categories/delete/{id}', [
        'as' => 'admin.categories.delete',
        'uses' => 'Admin\CategoryController@deleteAction'
    ])->where('id', '[0-9]+');
});

