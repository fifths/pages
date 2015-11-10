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

    //分类
    Route::get('/backend/category/index','Backend\CategoryController@index');
    Route::get('/backend/category/create','Backend\CategoryController@create');
    Route::post('/backend/category/store','Backend\CategoryController@store');
    Route::get('/backend/category/edit/{id}','Backend\CategoryController@edit');
    Route::post('/backend/category/update/{id}','Backend\CategoryController@update');
    Route::post('/backend/category/destroy/{id}','Backend\CategoryController@destroy');

    //文章
    Route::get('/backend/article/index','Backend\ArticleController@index');
    Route::get('/backend/article/create','Backend\ArticleController@create');
    Route::post('/backend/article/store','Backend\ArticleController@store');
    Route::get('/backend/article/edit/{id}','Backend\ArticleController@edit');
    Route::post('/backend/article/update/{id}','Backend\ArticleController@update');
    Route::post('/backend/article/destroy/{id}','Backend\ArticleController@destroy');
    Route::get('/backend/curl','Backend\ArticleController@curl');

    //tag
    Route::post('/backend/articleinfo/destroy/{id}','Backend\ArticleInfoController@destroy');
});

