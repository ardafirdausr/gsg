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
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => '/manage', 'as' => 'manage.'], function(){

    Route::group(['prefix' => '/contents', 'as' => 'contents.'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'ContentController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'ContentController@create']);
        Route::post('/', ['as' => 'store', 'uses' => 'ContentController@store']);
        Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'ContentController@destroy']);
    });

    Route::group(['prefix' => '/events', 'as' => 'events.'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'EventController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'EventController@create']);
        Route::post('/', ['as' => 'store', 'uses' => 'EventContrller@store']);
        Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'EventController@destroy']);
    });
});

Auth::routes();

