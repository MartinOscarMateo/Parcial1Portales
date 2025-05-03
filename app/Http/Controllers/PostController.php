<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Mostrar publis en el foro xdddddddddddddd
    public function index()
    {
        $posts = Post::latest()->get();
        return view('forum', compact('posts'));
    }

    // Mostrar el formulario
    public function create()
    {
        return view('admin.posts.create');
    }

    // Guardar la publi en la base
    public function store(Request $request)
    {
        // Validamos como campeones WAAA
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Crear post
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirigimos uwu mas mensajito jeje :3 
        return redirect()->route('posts.create')->with('success', 'Publicación creada correctamente.');
    }
}
