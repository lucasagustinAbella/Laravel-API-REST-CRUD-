<?php

namespace App\Http\Controllers;

use App\Models\User as Users;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getAll()
    {
        $users = Users::all();
        return response()->json($users);
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


    public function softDelete()
    {
        $users = Users::all();
        return response()->json($users);
    }

    public function updateById()
    {
        $users = Users::all();
        return response()->json($users);
    }
}
