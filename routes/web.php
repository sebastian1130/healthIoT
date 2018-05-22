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

Route::resource('users', 'UserController');
Route::resource('sistemas', 'SistemaController');
Route::resource('medicions', 'MedicionController');

///////SE AÑADEN ESTAS LÍNEAS PARA INFORMAR QUE SE VAN A UTILIZAR ESTOS CONTROLLERS.....

/******
POR RECOMENDACIÓN SE DEBE UTILIZAR LA TABLA USERS QUE VIENE POR DEFECTO, SE LE PUEDE AGREGAR LO QUE SE NECESITE, PERO NO
SE LE DEBE QUITAR NADA



******/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
