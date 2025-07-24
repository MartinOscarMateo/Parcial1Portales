@extends('layouts.app')

@section('title', 'Gestionar Publicaciones')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Publicaciones del Foro</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Crear Nueva Publicación</a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    

    {{-- Listado de publicaciones --}}
    @if($posts->isEmpty())
        <div class="alert alert-info">No hay publicaciones aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <p>{{ $post->id }}</p>
                        </td>
                        <td>
                            <p>{{ $post->title }}</p>
                        </td>
                        <td>
                            <p>{{ $post->content }}</p>
                        </td>
                        <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                               <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta publicación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form> 
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
