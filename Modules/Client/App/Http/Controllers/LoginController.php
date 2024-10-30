<?php

namespace Modules\Client\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.log-reg');
    }
    public function login(Request $request) {
        $credentials = $request->only('email','password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['Error'=> 'Email hoặc mật khẩu không chính xác']);
    }
    public function logout() {
        auth()->logout();
        return redirect()->route('home');
    }
    
}
