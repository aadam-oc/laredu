<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Register a new user (Registro de un nuevo usuario)
     */
    public function register(Request $request)
    {
        // Validación de la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Confirmar la contraseña
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Responder con el usuario creado
        return response()->json([
            'message' => 'Usuario registrado con éxito',
            'user' => $user
        ]);
    }

    /**
     * Login a user (Iniciar sesión)
     */
    public function login(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Verificar si el usuario existe
        $user = User::where('email', $request->email)->first();

        // Si el usuario no existe o la contraseña es incorrecta, devolver error
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Las credenciales proporcionadas son incorrectas.'
            ], 401);
        }

        // Crear un token para el usuario
        $token = $user->createToken('auth_token')->plainTextToken;

        // Responder con el token y los datos del usuario
        return response()->json([
            'message' => 'Login exitoso',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    /**
     * Logout a user (Cerrar sesión)
     */
    public function logout(Request $request)
    {
        // Revocar todos los tokens del usuario autenticado
        $request->user()->tokens()->delete();

        // Responder con un mensaje de éxito
        return response()->json([
            'message' => 'Logout exitoso'
        ], 200);
    }

    /**
     * Get current user (Obtener datos del usuario autenticado)
     */
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ], 200);
    }
}
