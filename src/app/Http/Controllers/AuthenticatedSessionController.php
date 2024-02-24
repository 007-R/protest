<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UserLoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function thanks()
    {
        return view('thanks');
    }
    public function tologin()
    {
        return view('auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $guard = $request->guard;

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect("/mypage")->with(['login_msg' => 'ログインしました。',]);
        }
        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }
}
