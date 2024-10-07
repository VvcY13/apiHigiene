<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar la entrada del usuario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // Intentar autenticar al usuario
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function me()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate(); // Obtener el usuario autenticado
            return response()->json($user);
        } catch (JWTException $e) {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken()); // Invalidar el token actual
            return response()->json(['message' => 'Successfully logged out']);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not log out, token could not be invalidated'], 500);
        }
    }
}
