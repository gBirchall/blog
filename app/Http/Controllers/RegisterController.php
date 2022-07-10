<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller {
    public function create() {
        return view('register.create');
    }

    public function store() {
        $atts =  request()->validate([
            //unique : user table and username column
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|min:7',
            //'password' => ['required', 'max:255', 'min:7'],
        ]);

        $user = User::create($atts);

        Auth::login($user);

        // session()->flash('success', 'Your account has been created');
        //redirect('/')->with shorthand method to use flash session
        return redirect('/')->with('success', 'Your account has been created');
    }
}
