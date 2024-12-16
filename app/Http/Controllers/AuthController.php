<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function loginAction(LoginRequest $request)
    {
        $creds = $request->validated();
        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return to_route('auth.login')->withErrors([
            'email' => 'Les informations de connexion sont incorrects.',
        ])->onlyInput('email');
    }

    public function logoutAction(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function dashboard(): View
    {
        return view('admin.dashboard');
    }
}
