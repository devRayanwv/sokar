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
    return view('main');
});


Auth::routes();

Route::get('/dashboard', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
Route::post('/profile', 'HomeController@editProfile');
Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::get('/plain', function(){
    return view('plain');
});