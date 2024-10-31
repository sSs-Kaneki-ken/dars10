<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        //
    }

    public function loginPage()
    {
        return view('Auth.login');
    }

    public function registerPage()
    {
        return view('Auth.register');
    }

    public function login(AuthLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('category.index')->with('success', 'Siz registratsiyadan muvaffaqiyatli otdingiz!');
            } else {
                return redirect()->route('poster')->with('success', "Hush kelibsiz!");
            }
        }

        return redirect()->back()->with('error', "Wrong Email or Password!");
    }

    public function register(AuthRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        Auth::login($user);

        return redirect()->route('poster')->with('success', "Siz registratsiyadan muvaffaqiyatli otdingiz!");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }


}
