<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewEmailController extends Controller
{
    public function sendNewEmail(Request $request)
    {
       $email = $request->validate([
            'email' => ['required', 'exists:users,email'],
        ]);


    }
}
