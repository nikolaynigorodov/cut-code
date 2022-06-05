<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Jobs\ForgotUserEmailJob;
use App\Models\User;

class LoginController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function forgot(ForgotPasswordRequest $request)
    {
        $user = User::where(["email" => $request["email"]])->first();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();

        dispatch(new ForgotUserEmailJob($user, $password));

        return redirect(route("home"));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if(auth("web")->attempt($request->validated())) {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }
}
