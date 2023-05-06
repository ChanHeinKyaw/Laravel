<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'password' => ['required', 'min:8'],
        ]);

        // $formData['password'] = bcrypt($formData['password']);
        $user = User::create($formData);

        // session()->flash('success', 'Welcome Dear, ' . $user->name);
        return redirect('/')->with('success', 'Welcome Dear, ' . $user->name);
    }
}
