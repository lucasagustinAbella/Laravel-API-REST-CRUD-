<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{

    public function create(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'user_id' => 'required|exists:users,id', // Se fija que el usuario exista
        ]);


        $post = Post::create([
            'name' => $request->name,
            'text' => $request->text,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'Post exitoso', 'post' => $post], 201);
    }
    public function getAll()
    {
        $posts = Post::all();

        if ($posts->isEmpty()) {
            return response()->json(['error' => 'No se encontraron Posts'], 404);
        }

        return response()->json($posts, 200);
    }


    public function getById(Request $request, string $id)
    {
        if ($request->user() || true) {
            $post = Post::find($id);

            if ($post) {
                return response()->json($post);
            } else {
                return response()->json(['error' => 'Post no encontrado'], 404);
            }
        } else {
            return response()->json(['error' => 'No autorizados'], 400);
        }
    }


    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post no encontrado'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Post eliminado correctamente'], 200);
    }


    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post no encontrado'], 404);
        }

        $post->update($request->only(['name', 'email', 'password']));

        return response()->json(['message' => 'Post actualizado correctamente', 'user' => $post], 200);
    }
}
