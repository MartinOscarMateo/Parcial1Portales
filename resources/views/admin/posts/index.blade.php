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
        <div class="card-header">Crear nuevo publicación</div>
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
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>{{ $post->id }}</td>
                            <td>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
                            </td>
                            <td>
                                <textarea name="content" class="form-control" rows="2" required>{{ $post->content }}</textarea>
                            </td>
                            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                            <td class="d-flex gap-2">
                                <button type="submit" class="btn btn-sm btn-secondary">Actualizar</button>
                        </form>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
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
