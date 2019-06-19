<?php
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'chat', 'as' => 'chat.', 'middleware' => 'auth'], function(){
    Route::get('rooms', 'RoomsController@index')->name('rooms.list');
    Route::get('rooms/{id}', 'RoomsController@show')->name('rooms.show');
    Route::post('rooms/{id}/message', 'RoomsController@createMessage')->name('rooms.create_message');
});
