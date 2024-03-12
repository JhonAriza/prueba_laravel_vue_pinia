<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    /**
     * Registro de un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        $validatedData['password'] = Hash::make($request->password);

        // Crea un nuevo usuario
        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;
        return response([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }


    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
    
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Credenciales incorrectas'], 401);
        }
    
        $user = auth()->user();
       // $accessToken = $user->createToken('authToken')->accessToken;
    
        return response([
            'message' => 'Logueado correctamente',
            'user' => $user,
            //'access_token' => $accessToken
        ]);
    }
    
}
