<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends Controller
{
    public function login(Request $request): Response
    {
        $email = $request->query('email');
        $password = $request->query('password');

        if (empty ($email) || empty ($password)) {
            return response(['message' => 'Email and password are required'], 401);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $success = $user->createToken('MyApp')->plainTextToken;
            return response(['token' => $success], 200);
        }

        return response(['message' => 'Email or password is incorrect'], 401);
    }



    public function logout(Request $request): Response
    {
        try {
            $request->user()->tokens()->delete();
            return response(['message' => 'Logged out successfully'], 200);
        } catch (ModelNotFoundException $exception) {
            return response(['message' => 'Token not found'], 404);
        }
    }
}
