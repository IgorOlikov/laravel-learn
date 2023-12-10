<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $user = $request->user();


        return $user;

    }
}
