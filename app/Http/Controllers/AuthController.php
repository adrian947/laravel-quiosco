<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response([
                'errors' => 'Incorrect email or password'
            ], 422);
        }
        $user = $request->user();
        $token = $user->createToken('token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user
        ];
    }
}
