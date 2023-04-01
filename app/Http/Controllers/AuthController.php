<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function signinPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        if (!Auth::attempt($validator->validated())) {
            return back()->withErrors(['invalid' => 'Invalid credentials']);
        }

        return redirect()->route('home');
    }

    public function signupPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|max:50|unique:users',
            'password' => 'required|min:8|same:re_password',
            'email' => 'required|email|unique:users'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $validated = $validator->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        Auth::login($user);

        return redirect()->route('home');
    }
}
