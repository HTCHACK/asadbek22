<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{


    public function login(Request $request)
    {

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return response()->json(['error' => 'UnAuthorized'], 401);
        }

        $accessToken = Auth::user()->createToken('accessToken')->accessToken;

        return response()->json(['success' => 'Successfully Login', 'access_token' => $accessToken], 200);
    }

    public function logout(LoginRequest $request)
    {
        $request->user()->tokens()->delete();
    }
}
