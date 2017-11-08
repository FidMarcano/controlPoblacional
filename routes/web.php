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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/encuesta', 'opcionesController@encuesta')->middleware('authenticated');
Route::get('/resultado', 'opcionesController@resultado')->middleware('authenticated');
Route::get('/pdf', 'PDFController@resultado')->middleware('authenticated');
Route::get('/administrar', 'opcionesController@administracion')->middleware('authenticated');


Route::resource('/encuestas', 'encuestaController');
Route::resource('/useradm', 'userAdminController');
Route::resource('/administracion', 'adminController');

