@extends('layouts.app')

@section('title', 'Novedades')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Novedades</h1>

    @if($posts->isEmpty())
        <div class="alert alert-info text-center">
            Todavía no hay publicaciones disponibles.
        </div>
    @else
        <div class="timeline">
            @foreach($posts as $post)
                <div class="timeline-item">
                    <div class="timeline-date">
                        {{ $post->created_at->format('d/m/Y') }}
                    </div>
                    <div class="timeline-content">
                        <h5 class="text-primary">{{ $post->title }}</h5>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
.timeline {
    position: relative;
    padding-left: 50px;
    border-left: 2px solid #0d6efd;
    margin-top: 40px;
}

.timeline-item {
    position: relative;
    margin-bottom: 50px;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -21px;
    top: 6px;
    width: 16px;
    height: 16px;
    background-color: #0d6efd;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 0 0 2px #0d6efd;
}

.timeline-date {
    font-weight: 600;
    margin-bottom: 8px;
    color: #0d6efd;
    padding-left: 5px;
}

.timeline-content {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.timeline-content:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
</style>


@endsection
