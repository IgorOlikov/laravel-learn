<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Message;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults()]
        ]);


            $user = User::create($attributes);


        event(new Registered($user));
        Auth::login($user, true);



        return response([
            'message' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?'
        ], Response::HTTP_CREATED);

        //$userAgent=$request->userAgent();
        //$token = $user->createToken($userAgent)->plainTextToken;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        //remember?
        return response($request->user(), Response::HTTP_CREATED);
    }

        return response([
            'email' => 'The provided credentials do not match our records.'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent();
    }



}
