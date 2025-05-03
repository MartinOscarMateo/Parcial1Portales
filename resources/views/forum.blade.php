@extends('layouts.app')

@section('title', 'Novedades')

@section('content')
    <h1 class="mb-4">Novedades y Noticias</h1>

    @if($posts->isEmpty())
        <div class="alert alert-info">
            Todavía no hay publicaciones.
        </div>
    @else
        <div class="list-group">
            @foreach($posts as $post)
                <div class="list-group-item">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <p class="mb-1">{{ $post->content }}</p>
                    <small class="text-muted">Publicado el {{ $post->created_at->format('d/m/Y') }}</small>
                </div>
            @endforeach
        </div>
    @endif
@endsection
