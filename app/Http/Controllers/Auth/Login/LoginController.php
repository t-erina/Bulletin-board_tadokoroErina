<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginForm(Request $request)
    {

        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            return redirect(route('top'));
        } else {
            return back();
        }
    }

    public function logout()
    {
        //ログアウトの処理かく
        return redirect('');
    }
}
