<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
            'estado' => $request->estado,
        ]);

        return response()->json(['user' => $user], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json($user);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(userRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id); // Buscar el usuario por ID

            // Actualizar los datos del usuario
            $user->update([
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'tipo_documento' => $request->tipo_documento,
                'numero_documento' => $request->numero_documento,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Asegúrate de hashear la contraseña si se actualiza
                'rol' => $request->rol,
                'estado' => $request->estado,
            ]);

            return response()->json($user, 200); // Devuelve el usuario actualizado
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id); // Buscar el usuario por ID
            $user->delete(); // Eliminar el usuario
    
            return response()->json(['message' => 'Usuario eliminado con éxito.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Usuario no encontrado.'], 404);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
