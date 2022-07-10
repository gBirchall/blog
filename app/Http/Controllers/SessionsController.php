<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller {
    public function create() {

        return view('sessions.create');
    }
    public function store() {

        $attr = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //auth success
        if (!auth::attempt($attr)) {
            //auth failed
            // return back()
            //     ->withInput()
            //     ->withErrors(['email' => 'Incorrect username or password']);
            throw ValidationException::withMessages(['email' => 'Incorrect username or password']);
        }
        //session fixation attack fix
        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back');
    }
    public function destroy() {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
