<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\ProductResource;


use App\Http\Resources\User\UserResource;
use App\Models\Product;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\Guard;
use Laravel\Sanctum;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all();
       return UserResource::collection($users);

    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults()],
            'user_role_id' => ['int','exists:user_role,id'],
            'email_verified_at' => ['bool'],
        ]);
        if (!$attributes['email_verified_at']) {
            $attributes['email_verified_at'] = null;
        }else {
                $attributes['email_verified_at'] = now();
            }
        $user =  User::create($attributes);

         return response($user,Response::HTTP_CREATED);
    }

    public function show(User $user)
    {
        return response($user,200);
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults()]
        ]);

           $user->update($attributes);

        return response($user,Response::HTTP_CREATED);
    }
    public function destroy(User $user)
    {
         $user->delete();

         return response(["message" => "user has been deleted"],200);
    }


}
