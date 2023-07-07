<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                "success" => true,
                "data" => $user,
                "token" => $user->token
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            "success" => true
        ]);
    }
}
