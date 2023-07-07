<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next)
    {
        $user = User::where('token', $request->header('token'))->first();
        if ($user) {
            return $next($request);
        }
        return redirect('/')->with('error', 'You are not authorised to access');
    }
}