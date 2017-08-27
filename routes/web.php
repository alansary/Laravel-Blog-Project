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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::resource('posts', 'PostsController');

Route::get('/posts/find/title/{id}', 'FindController@title');
Route::get('/posts/find/created_at/{id}', 'FindController@created_at');
Route::get('/posts/find/user/{id}', 'FindController@user');
Route::get('/posts/find/body/{id}', 'FindController@body');