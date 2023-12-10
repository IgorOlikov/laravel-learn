<?php

namespace App\Http\Middleware;

use http\Message;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : "middleware auth not passed";
    }
}

///return $request->expectsJson() ? null : route('login');
