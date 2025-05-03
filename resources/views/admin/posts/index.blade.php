@extends('layouts.app')

@section('title', 'Gestionar Publicaciones')

@section('content')
<div class="container">
    <h1 class="mb-4">Publicaciones del Foro</h1>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulario para nueva publicación --}}
    <div class="card mb-4">
        <div class="card-header">Crear nueva publicación</div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea name="content" rows="3" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>
        </div>
    </div>

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
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 60) }}</td>
                        <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            {{-- Botón Editar (a implementar más adelante) --}}
                            <a href="#" class="btn btn-sm btn-secondary me-2 disabled">Editar</a>

                            {{-- Botón Eliminar --}}
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que querés eliminar esta publicación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
