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
Route::get('/privateWelcome','SiteController@privateWelcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('isAdmin');

Route::group(['middleware'=>'isAdmin'], function(){
  Route::resource('users', 'UserController');
  Route::resource('sistemas', 'SistemaController');
  Route::resource('medicions', 'MedicionController');
});



// Auth::routes();
// Route::get('/home', 'HomeController@index');
//
// Route::resource('users', 'UserController');
// Route::resource('sistemas', 'SistemaController');
// Route::resource('medicions', 'MedicionController');
