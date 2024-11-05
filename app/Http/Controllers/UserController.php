<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User as Users;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getAll()
    {
        $users = Users::paginate(2);

        if ($users->isEmpty()) {
            return response()->json(['error' => 'No se encontraron usuarios'], 404);
        }

        return response()->json($users, 200);
    }


    public function getById(Request $request, string $id)
    {
        if ($request->user() || true) {
            $user = Users::find($id);

            if ($user) {
                return response()->json($user);
            } else {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }
        } else {
            return response()->json(['error' => 'No auterizados'], 400);
        }
    }


    public function destroy(string $id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->update($request->only(['name', 'email', 'password']));

        return response()->json(['message' => 'Usuario actualizado correctamente', 'user' => $user], 200);
    }

    public function findByEmail(Request $request)  {

        $user = Users::where('email', $request->email)->first();
        
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        else {
            return $user;
        }
    }
}
