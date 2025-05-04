@extends('layouts.app')

@section('title', 'Gstionar Usuarios')

@section('content')
<div class="container">
    <h1 class="mb-4">Gestionar Usuarios</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{-- Formulario para nuevo usuario --}}
<div class="card mb-4">
    <div class="card-header">Crear nuevo usuario</div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select name="role" class="form-select" required>
                    <option value="user">Usuario</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>
</div>

@if($users->isEmpty())
    <div class="alert alert-info">No hay usuarios aún.</div>
@else
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td>{{ $user->id }}</td>
                        <td>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                        </td>
                        <td>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                        </td>
                        <td>
                            <select name="role" class="form-select" required>
                                <option value="user" {{ $user->hasRol('user') ? 'selected' : '' }}>Usuario</option>
                                <option value="admin" {{ $user->hasRol('admin') ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                    </form>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que querés eliminar este usuario?')">Eliminar</button>
                    </form>
                        </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
