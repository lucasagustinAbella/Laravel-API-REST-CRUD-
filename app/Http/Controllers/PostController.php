<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        if ($posts->isEmpty()) {
            return response()->json(['error' => 'No se encontraron Posts'], 404);
        }

        return response()->json($posts, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'user_id' => 'required|exists:users,id', // Verifica que el usuario exista
        ]);

        $post = Post::create($request->all());

        return response()->json(['message' => 'Post exitoso', 'post' => $post], 201);
    }

    public function show(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['error' => 'Post no encontrado'], 404);
        }
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
    
        if (!$post) {
            return response()->json(['error' => 'Post no encontrado'], 404);
        }
    
        try {
            $post->update($request->only(['name', 'text']));
            return response()->json(['message' => 'Post actualizado correctamente', 'post' => $post], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el post: ' . $e->getMessage()], 500);
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
}
