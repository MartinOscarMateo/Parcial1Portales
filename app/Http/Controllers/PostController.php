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

    // Crear nueva publi
    public function create()
    {
        return view('admin.posts.create');
    }

    // Editar una publi
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
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
            'title' => 'required|string||min:5|max:255',
            'content' => 'required|string|min:10|max:400',
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
            'title' => 'required|string|min:5|max:255',
            'content' => 'required|string|min:10|max:400',
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
