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
////////Esto tiene lo del admin
//
Route::get('adminPages/adminWelcome','SiteController@privateWelcome')->middleware('isAdmin')->name('privateWelcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('isAdmin');
Route::post('/addData/{id}','MedicionController@addData')->middleware('isAdmin')->name('medicions.addData');
Route::get('/addRef/{id}','MedicionController@addRef')->middleware('isAdmin')->name('medicions.addRef');

Route::group(['middleware'=>'isAdmin'], function(){
  Route::resource('users', 'UserController');
});
// Route::get('users', 'UserController@index')->middleware('isAdmin')->name('home');

// Route::resource('users', 'UserController');
Route::resource('sistemas', 'SistemaController');
Route::resource('medicions', 'MedicionController');
Route::resource('takens', 'TakenController');



// Auth::routes();
// Route::get('/home', 'HomeController@index');
//
// Route::resource('users', 'UserController');
// Route::resource('sistemas', 'SistemaController');
// Route::resource('medicions', 'MedicionController');
