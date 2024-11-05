<?php

namespace App\Http\Controllers;

use App\Models\User as Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = Users::where('email', $request->email)->first();
            
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Contraseña incorrecta'], 401);
        }
    
        $token = $user->createToken('login_token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'token' => $token
        ], 201);
    }
    
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);
            
            $user = Users::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'slug' => Str::slug($request->name),
            ]);
              
        $user->remember_token = Str::random(10);
        $user->save();

            
            return response()->json(['message' => 'Registro exitoso', 'user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al registrar el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
{
    $request->user()->tokens->each(function ($token) {
        $token->delete();
    });

    return response()->json(['message' => 'Sesión cerrada correctamente']);
}

}
