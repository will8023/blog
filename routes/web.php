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
Route::get('user/add','UserController@add');
Route::any('user/index','UserController@index');
Route::any('user/store','UserController@store');
Route::get('user/edit/{id}','UserController@edit');
Route::any('user/update','UserController@update');

Route::get('user/del/{id}','UserController@destroy');
