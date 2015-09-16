<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/backend/login','Backend\LoginController@index');
Route::post('/backend/login','Backend\LoginController@login');
Route::get('/backend/logout','Backend\LoginController@logout');


Route::group(['middleware' => 'manage'],function(){
    Route::get('/backend/index','Backend\IndexController@index');
    Route::get('/backend/category/index','Backend\CategoryController@index');
    Route::get('/backend/category/create','Backend\CategoryController@create');
});

