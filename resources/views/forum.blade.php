@extends('layouts.app')

@section('title', 'Novedades')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Novedades y Noticias</h1>

    @if($posts->isEmpty())
        <p class="text-center">Aún no hay publicaciones.</p>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <p class="card-text">
                                <small class="text-muted">Publicado el {{ $post->created_at->format('d/m/Y') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
