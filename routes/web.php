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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chat/{buddy}', 'ChatController@index');

Route::post('send_message', 'ChatController@store');

Route::get('video-chat', "VideoRoomsController@index");
Route::prefix('room')->middleware('auth')->group(function() {
   Route::get('join/{roomName}', 'VideoRoomsController@joinRoom');
   Route::post('create', 'VideoRoomsController@createRoom');
});
