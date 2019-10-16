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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/destination', function () {
        return view('destination');
    })->name('destination');
//    Route::get('/blog', function () {
//        return view('blog');
//    })->name('blog');
});
Route::group(['namespace' => 'Backend'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});


