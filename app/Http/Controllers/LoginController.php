<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $messages = [
            'email.required' => 'Поле email обязательно для заполнения',
            'email.email' => 'Введите корректный email адрес',
            'password.required' => 'Поле пароль обязательно для заполнения',
        ];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], $messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->withErrors([
                'success' => 'Вы успешно вошли в систему',
            ]);
        }

        return back()->withErrors([
            'error' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email');
    }

    public function login(Request $request)
    {
        return view('login', ['user' => Auth::user()]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withErrors([
            'success' => 'Вы успешно вышли из системы',
        ]);
    }
}
