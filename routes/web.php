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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'InicioController@index')->name('index');
Route::get('/registro', 'InicioController@registro')->name('registro');




//AJAX DATA METHODS
Route::post('/login', 'InicioController@login')->name('login');
Route::post('/saveCarnet', 'InicioController@saveCarnet')->name('save-carnet');
Route::post('/thirtyPercent', 'InicioController@thirtyPercent')->name('thirtyPercent');
