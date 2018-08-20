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

Route::post('/message', 'MessagesController@message')->name('message');

Route::get('/home/message/{message}',
    ['middleware' =>  ['auth'], 'uses' => 'HomeController@show'])->name('message-show');

Route::post('/home/message/answer/{message}',
    ['middleware' =>  ['auth'], 'uses' => 'HomeController@answer'])->name('message-answer');

Route::get('/home/message/delete/{message}',
    ['middleware' =>  ['auth'], 'uses' => 'HomeController@delete'])->name('message-del');

Route::post('/home/email/update',
    ['middleware' =>  ['auth'], 'uses' => 'HomeController@emailUpdate'])->name('email-update');
