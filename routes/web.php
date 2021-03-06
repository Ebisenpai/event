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
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', 'EventController@index');
    Route::get('/events', 'EventController@index');
    Route::get('/events/create', 'EventController@create');
    Route::post('/events/approve', 'EventController@approve');
    Route::get('/events/{event}', 'EventController@show');
    Route::delete('/events/{event}', 'EventController@delete');
    Route::get('/events/{event}/{chatroom}', 'ChatRoomController@chat');
    Route::post('/events', 'EventController@store');
    Route::post('/admin', 'AdministratorController@store');
    Route::post('/invite', 'EventInvitationController@store');
    Route::post('/firstchats', 'ChatRoomController@store');
    Route::post('/chats', 'ChatController@store');
    Route::post('/members','MemberController@store');
    Route::post('/participate', 'EventController@participate');
    Route::post('/nonparticipate', 'EventController@nonparticipate');
});
Route::get('/login/line', 'LineLoginController@index');
Route::get('/login/line/callback','LineLoginController@callback');

