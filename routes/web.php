<?php
use App\Role;
use App\User;
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
Route::middleware('auth')->get('/meeting/send/{meeting}', 'SendMailController');
Route::middleware('auth')->get('/user/create', function(){
  $roles = Role::all();
  return view('auth.register', compact('roles'));
});
Route::middleware('auth')->get('/profile', function(){
  $user = User::all();
  return view('auth.profile', compact('user'));
});
