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

Route::get('/', function () {
    return view('welcome');
});
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
Route::post('password/reset', 'ResetPasswordController@reset');
Route::resource('categories','CategoryController',['except' => ['create']]);
Route::resource('tags','TagController',['except' => ['create']]);// it wiill create all route except create and if use only in place of except it will only create route
Route::resource('comments','CommentController',['except' =>['create']]);
Route::post('comments/{post_id}',['uses' => 'CommentController@store', 'as' => 'comments.store']);
Route::post('comments/{id}/edit',['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}',['uses' => 'CommentController@update', 'as' => 'comments.update']);
Route::put('comments/{id}',['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete',['uses' => 'CommentController@delete', 'as' => 'comments.delete']);
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact','PagesController@postContact');
Route::get('/', 'PagesController@getIndex');
Route::resource('/post','postController');
Route::post('/store','postController@store');
Route::get('activation/{key}', 'Auth\RegisterController@activation');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
