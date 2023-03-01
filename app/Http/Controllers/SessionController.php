<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
            // validate the form data
    $attributes = request()->validate([
        'email' => ['required', 'exists:users,email'],
        'password' => ['required'],
    ]);

    // attempt login via the auth helper
    if( auth()->attempt($attributes) ) {
        $message = 'Welcome back, ' . auth()->user()->name . '!';
        session()->flash('success',$message);

        return redirect('/');
    }

    // handle auth attempt failure
    return back() // send the user back to the form
    ->withInput()  // send the data back to the form too
    ->withErrors(['email' => 'Email or Password is invalid.']); // send error and message
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
