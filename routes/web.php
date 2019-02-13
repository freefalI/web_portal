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

//posts
Route::resource('posts', 'PostController');
Route::patch('posts/{post}/like', 'PostController@like')->name('post.like');
Route::patch('posts/{post}/comment', 'PostController@comment')->name('post.comment');

//users
// Route::resource('users','AccountController')->only([
//     'show','edit','update'
// ]);
Route::get('account', 'AccountController@index')->middleware('auth')->name('account.index');
Route::get('account/edit', 'AccountController@edit')->middleware('auth')->name('account.edit');
Route::patch('account/update', 'AccountController@update')->middleware('auth')->name('account.update');
Route::delete('account/delete_avatar', 'AccountController@deleteAvatar')->middleware('auth')->name('account.delete_avatar');

Route::get('search', 'UserSearchController@index')->name('search');
Route::get('search.ajax', 'UserSearchController@ajax_search');


Route::get('users/{user}', 'UserController@show');
Route::get('users/{user}/followers', 'UserController@followers');
Route::get('users/{user}/followings', 'UserController@followings');

Route::post('users/{user}/follow', 'FollowRequestController@follow')->middleware('auth');
Route::post('requests/{followRequest}/accept', 'FollowRequestController@acceptFollowRequest')->middleware('auth');

Route::get('feed', 'FeedController@index')->name('feed')->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

