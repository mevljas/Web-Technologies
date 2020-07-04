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


Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


Route::put('narocila', 'NarocilaController@index');
Route::resource('jedilnik', 'JedilnikController');
Route::resource('narocila', 'NarocilaController');
Route::resource('zaloga', 'ZalogaController');
Route::resource('dobavitelj', 'DobaviteljController');
Route::resource('dobava', 'DobavaController');