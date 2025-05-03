@extends('layouts.app')

@section('title', 'Gestionar Publicaciones')

@section('content')
<div class="container">
    <h1 class="mb-4">Publicaciones del Foro</h1>

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
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 60) }}</td>
                        <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
