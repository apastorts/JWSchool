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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/meeting/new', 'HomeController@new');
Route::get('/meeting/show/{meeting}', 'MeetingController@show');

Route::middleware('auth')->get('/meeting/delete/{meeting}', 'MeetingController@delete');
