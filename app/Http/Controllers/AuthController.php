<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(): View|Factory|RedirectResponse|Application
    {
        return \view('Auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        }

        return redirect()->route('login')->withSuccess('Oppes! You have entered invalid credentials');

    }

    public function dashboard(): View|Factory|RedirectResponse|Application
    {
       if (Auth::check()) {
           return \view('welcome');
       }

       return redirect()->route('login');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
