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

use App\Events\ReceiveMessage;
use App\Events\SendChatToAdmin;

Route::post('/chats/send', ['as' => 'send-chat', 'uses' => 'ChatController@sendChat']);

// Route::group(['as' => 'auth'], function(){
//     Route::get('/login', ['as' => 'showLoginForm', 'uses' => 'LoginController@showLoginForm']);
//     Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@login']);
// });

Route::group(['as' => 'guest.'], function(){
    Route::get('/', ['as' => 'home', 'uses' => 'GuestController@showHome']);
    Route::get('/contents', ['as' => 'contents', 'uses' => 'GuestController@showAllContents']);
    Route::get('/contents/{id}', ['as' => 'content', 'uses' => 'GuestController@showContent']);
    Route::get('/events', ['as' => 'events', 'uses' => 'GuestController@showAllEvents']);
    Route::get('/events/{id}', ['as' => 'event', 'uses' => 'GuestController@showEvent']);
    Route::get('/events/{id}/order', ['as' => 'create-event-order', 'uses' => 'GuestController@showCreateEventOrderForm']);
    Route::post('/events/{id}/order', ['as' => 'store-event-order', 'uses' => 'GuestController@storeEventOrder']);
    Route::get('/events/orders/{encodedOrderId}', ['as' => 'event-order', 'uses' => 'GuestController@showEventOrder']);
    Route::get('/events/orders/ticket/{encodedOrderId}', ['as' => 'ticket-event-order', 'uses' => 'GuestController@showTicketEventOrder']);
    Route::post('/chats/connect', ['as' => 'chat-connect', 'uses' => 'GuestController@connectChat']);
});

Route::group(['as' => 'manage.', 'prefix' => '/manage', 'middleware' => ['auth']], function(){

    Route::group(['prefix' => '/contents', 'as' => 'contents.'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'ContentController@showAllContents']);
        Route::get('/create', ['as' => 'create', 'uses' => 'ContentController@showCreateContentForm']);
        Route::post('/', ['as' => 'store', 'uses' => 'ContentController@storeContent']);
        Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'ContentController@destroyContent']);
    });

    Route::group(['prefix' => '/events', 'as' => 'events.'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'EventController@showAllEvents']);
        Route::get('/create', ['as' => 'create', 'uses' => 'EventController@showCreateEventForm']);
        Route::post('/', ['as' => 'store', 'uses' => 'EventController@storeEvent']);
        Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'EventController@destroyEvent']);
    });

    Route::group(['prefix' => '/chats', 'as' => 'chats.'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'ChatController@index']);
        Route::get('/{email}', ['as' => 'email', 'uses' => 'ChatController@getChatByEmail']);
    });
});

Auth::routes();
