<?php


namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('login', 'password'))) {
            $request->session()->regenerate();
            return redirect(route('all_tasks'));
        }
        return back()->withErrors(__('tasks.invalid_credentials'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('all_tasks'));
    }
}
