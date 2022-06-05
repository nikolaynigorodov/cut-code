<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        if($user) {
            //event(new Registered($user));

            auth("web")->login($user);
        }

        return redirect(route("home"));
    }
}
