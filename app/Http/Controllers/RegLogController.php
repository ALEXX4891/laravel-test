<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;



class RegLogController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
            'role_id' => 2, // role_id for user
        ]);
        $credentials = $request->only('name', 'email', 'password');

        if (Auth::attempt($credentials, true)) {
            return redirect()->route('home');
        }
        else {
            return back()->withInput()->withErrors('email', 'Invalid data');
        }

    }

    public function edit()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials, true)) {
            // return redirect()->back()->with('error', 'Invalid credentials');
            return back()->withInput()->withErrors('email', 'Invalid data');
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
