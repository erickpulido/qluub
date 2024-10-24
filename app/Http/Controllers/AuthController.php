<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\AuthUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public function authenticate(AuthUserRequest $request){
        if (!Auth::attempt($request->only('email', 'password')))
            return ApiResponseClass::sendResponse("No autorizado", "", 401);

        $data = [
            'token' => $request->user()->createToken($request->device)->plainTextToken,
        ];

        return ApiResponseClass::sendResponse($data, "success", 200);
    }

    public function logout(Request $request, User $user)
    {
        auth()->logout(); // For session-based authentication

        return ApiResponseClass::sendResponse("Sesión terminada", "", 200);
    }
}
