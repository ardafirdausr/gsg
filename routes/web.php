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

Route::group(['as' => 'guest.'], function(){
    Route::get('/', ['as' => 'home', 'uses' => 'GuestController@showHome']);
    Route::get('/contents', ['as' => 'contents', 'uses' => 'GuestController@showContents']);
    Route::get('/contents/{id}', ['as' => 'content', 'uses' => 'GuestController@showContent']);
    Route::get('/events', ['as' => 'events', 'uses' => 'GuestController@showEvents']);
    Route::get('/events/{id}', ['as' => 'event', 'uses' => 'GuestController@showEvent']);
    Route::get('/events/{id}/order', ['as' => 'create-event-order', 'uses' => 'GuestController@createEventOrder']);
    Route::post('/events/{id}/order', ['as' => 'store-event-order', 'uses' => 'GuestController@storeEventOrder']);
    Route::get('/events/orders/{encodedOrderId}', ['as' => 'event-order', 'uses' => 'GuestController@showEventOrder']);
    Route::get('/events/orders/ticket/{encodedOrderId}', ['as' => 'ticket-event-order', 'uses' => 'GuestController@showTicketEventOrder']);
});

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
        Route::post('/', ['as' => 'store', 'uses' => 'EventController@store']);
        Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'EventController@destroy']);
    });

    Route::group(['prefix' => '/chats', 'as' => 'chats.'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'ChatController@index']);
    });
});

Auth::routes();