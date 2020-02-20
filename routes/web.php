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

Route::post('/schedule/{date}', 'HomeController@find');

Route::middleware('auth')->get('/meeting/delete/{meeting}', 'MeetingController@delete');
Route::middleware('auth')->get('/meeting/pdf/{meeting}', 'MeetingController@toPDF');
Route::middleware('auth')->get('/meeting/send/{meeting}', 'SendMailController');
Route::middleware('auth')->get('/user/create', function(){
  $roles = Role::all();
  return view('auth.register', compact('roles'));
});
Route::middleware('auth')->get('/profile', function(){
  $users = User::with(['role'])->orderBy('name')->paginate(10);
  return view('auth.profile', compact('users'));
});

Route::middleware('auth')->get('/profile/{user}', function(User $user){
    $roles = Role::all();
    return view('auth.user', compact('user', 'roles'));
});
Route::middleware('auth')->post('/profile/update/{user}', 'UserController@update');
Route::middleware('auth')->get('/congregation/{user}', function(User $user){
    return view('auth.congregation', compact('user'));
});
Route::middleware('auth')->post('/congregation/update/{cong}', 'UserController@congregation');
