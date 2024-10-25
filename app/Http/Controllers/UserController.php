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
}
