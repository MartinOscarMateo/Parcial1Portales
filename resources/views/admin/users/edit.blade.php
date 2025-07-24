@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
{{-- Formulario para editar el usuario --}}
<div class="card mb-4">
    <div class="card-header">Editar Usuario</div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select name="role" class="form-select" required>
                    <option value="user" {{ $user->hasRol('user') ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $user->hasRol('admin') ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
</div>
@endsection
