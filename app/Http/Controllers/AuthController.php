<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Contraseña incorrecta'], 401);
        }

        Auth::login($user);

        return response()->json(['message' => 'Logeado correctamente', 'user' => $user], 200);
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'slug' => Str::slug($request->name)
            ]);
            
            return response()->json(['message' => 'Registro exitoso', 'user' => $user], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al registrar el usuario: ' . $e->getMessage()], 500);
        }
    }
}
