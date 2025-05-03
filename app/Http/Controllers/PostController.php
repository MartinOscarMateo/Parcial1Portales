<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Mostrar publicaciones públicas (foro)
    public function index()
    {
        $posts = Post::latest()->get();
        return view('forum', compact('posts'));
    }

    // Mostrar todas las publicaciones en el panel admin
    public function adminIndex()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Guardar una nueva publicación
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirigir a la vista admin de publicaciones
        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    }

    // Eliminar una publicación
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        // Redirigir a la vista admin de publicaciones
        return redirect()->route('posts.index')->with('success', 'Publicación eliminada correctamente.');
    }
}
