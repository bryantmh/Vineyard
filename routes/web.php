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

Route::get('/feed', 'Controller@index')->name('infiniteScroll');
Route::get('/', 'Controller@home')->name('welcome');
Route::post('/storePost', 'Controller@storePost')->name('storePost');
Route::post('/storeComment', 'Controller@storeComment')->name('storeComment');
Route::post('/modifyPost', 'Controller@modifyPost')->name('modifyPost');
Route::post('/deleteComment', 'Controller@deleteComment')->name('deleteComment');
Route::post('/upvote', 'Controller@upvote')->name('upvote'); 
Route::get('/commentsForm', function(){
	return view('comment');
});
