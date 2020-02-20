<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(User $user, Request $request)
    {
        $email = $user->email == request('email') ? [] : ['email' => ['required','string', 'email', 'max:255', 'unique:users']];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            $email,
            'password' => ['confirmed'],
            'role' => 'required',
            'sex' => 'required'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        if(request('password')){
            $user->password = Hash::make(request('password'));
        }
        $user->role_id = request('role');
        $user->sex = request('sex');
        $user->save();

        return redirect('/profile');
    }
}
