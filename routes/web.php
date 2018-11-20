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

Route::get('/', 'Controller@index')->name('infiniteScroll');
Route::get('/storePost', 'Controller@storePost')->name('storePost');
	// function () {
    // return view('welcome');

// });
