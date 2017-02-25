<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/posts/{id}', 'HomeController@showPost');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/posts', 'Admin\PostsController');
    Route::resource('admin/comments', 'Admin\CommentsController');

});


