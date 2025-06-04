@extends('layouts.app')

@section('title', 'Novedades')

@section('content')
<div class="container my-5 py-5">
    <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Novedades y Noticias</h1>

    @if($posts->isEmpty())
        <div class="text-center py-4 bg-light rounded-3 shadow-sm">
            <i class="bi bi-newspaper fs-2 text-muted mb-3"></i>
            <p class="lead fw-bold text-dark mb-2">Todavía no hay publicaciones</p>
            <p class="text-muted mx-auto" style="max-width: 500px;">Pronto tendremos novedades sobre DC Shoes. ¡Volvé para enterarte de todo!</p>
        </div>
    @else
        <div class="list-group shadow-sm rounded-3">
            @foreach($posts as $post)
                <div class="list-group-item border-0 transition-transform hover-scale py-3">
                    <h5 class="mb-2 fw-bold text-primary">{{ $post->title }}</h5>
                    <p class="mb-2 text-muted">{{ $post->content }}</p>
                    <small class="text-muted">Publicado el {{ $post->created_at->format('d/m/Y') }}</small>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    .transition-transform {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .hover-scale:hover {
        transform: scale(1.01);
        opacity: 0.95;
        background-color: #f8f9fa;
    }
    .list-group-item {
        border-radius: 5px;
    }
</style>
@endsection