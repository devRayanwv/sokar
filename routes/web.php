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

Route::group(['middleware' => ['auth']], function() {

    Route::get('/home', 'HomeController@index');

    Route::resource('users','UserController');

    Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
    Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
    Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
    Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
    Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
    Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
    Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]);

    Route::get('userCRUD2',['as'=>'userCRUD2.index','uses'=>'UserCRUD2Controller@index','middleware' => ['permission:user-list|user-edit|user-delete']]);
    Route::get('userCRUD2/{id}',['as'=>'userCRUD2.show','uses'=>'UserCRUD2Controller@show']);
    Route::get('userCRUD2/{id}/edit',['as'=>'userCRUD2.edit','uses'=>'UserCRUD2Controller@edit','middleware' => ['permission:user-edit']]);
    Route::patch('userCRUD2/{id}',['as'=>'userCRUD2.update','uses'=>'UserCRUD2Controller@update','middleware' => ['permission:user-edit']]);
    Route::delete('userCRUD2/{id}',['as'=>'userCRUD2.destroy','uses'=>'UserCRUD2Controller@destroy','middleware' => ['permission:user-delete']]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::get('/', 'AdminController@index');
    Route::get('/test', 'AdminController@test');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['role:user']], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/mbs', 'HomeController@mbs');
    Route::post('/mbs', 'HomeController@addMbs');

    Route::get('/profile', 'HomeController@profile');
    Route::post('/profile', 'HomeController@editProfile');

    Route::get('/settings', 'HomeController@settings');
    Route::post('/settings', 'HomeController@editSettings');

    Route::get('/medicine', 'HomeController@medicine');
    Route::post('/medicine', 'HomeController@addMedicine');
    Route::get('/medicine/delete/{medID}', 'HomeController@medicineDelete');

    Route::get('/exercise', 'HomeController@exercise');
    Route::post('/exercise', 'HomeController@addExercise');
    Route::get('/exercise/delete/{exerciseID}', 'HomeController@exerciseDelete');


    Route::get('/pdf', 'HomeController@pdfPage');
    Route::get('/pdf/get/{filename}', 'HomeController@pdfDownload');
    Route::get('/pdf/delete/{fileID}', 'HomeController@pdfDelete');

    Route::post('/pdf', 'HomeController@generatePDF');

    Route::get('/testing', 'HomeController@testing');

    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
});

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');
Route::get('/plain', function(){
    return view('layouts.plain');
});