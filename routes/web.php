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

Route::get('/', 'BlogController@index')->name('blog');

Route::get('/posts/{id}', 'PostController@index');

Route::post('/', 'BlogController@store')->name('search');

Route::get('/login', 'LoginController@index');

Route::post('/login', 'LoginController@store')->name('login');

Route::get('/logout', 'LoginController@logout');

Route::get('/new', 'PostController@add')->name('new');

Route::post('/new', 'PostController@store')->name('submitPost');

Route::post('/del', 'PostController@delete')->name('delPost');

Route::get('/edit/{id}', 'PostController@edit_index');

Route::post('/edit', 'PostController@edit')->name('editPost');

Route::post('/commnet', 'CommentController@store')->name('comment');

Route::post('/delc', 'CommentController@delete')->name('delComment');

Route::prefix('api')->group(function() {
    Route::get('posts', 'RestController@posts');
    Route::get('comments', 'RestController@comments');
});