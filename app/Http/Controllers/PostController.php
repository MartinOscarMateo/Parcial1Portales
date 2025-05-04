<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Mostrar publis
    public function index()
    {
        $posts = Post::latest()->get();
        return view('forum', compact('posts'));
    }

    // Mostrar todas las publis
    public function adminIndex()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Guardar nueva publi
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

        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    }

    // Actualiza una publi existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }

    // Eliminar una publi
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publicación eliminada correctamente.');
    }
}
