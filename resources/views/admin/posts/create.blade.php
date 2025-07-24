@extends('layouts.app')

@section('title', 'Crear Publicación')

@section('content')
{{-- Formulario para nueva publicación --}}
<div class="card mb-4">
    <div class="card-header">Crear nuevo publicación</div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenido</label>
                <textarea name="content" rows="3" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}"></textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
    </div>
</div>
@endsection
