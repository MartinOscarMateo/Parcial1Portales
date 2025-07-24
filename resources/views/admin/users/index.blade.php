@extends('layouts.app')

@section('title', 'Gestionar Usuarios')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestionar Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Usuario</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


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
                    <td>
                        <p>{{ $user->id }}</p>
                    </td>
                    <td>
                        <p>{{ $user->name }}</p>
                    </td>
                    <td>
                        <p>{{ $user->email }}</p>
                    </td>
                    <td>
                        @if($user->hasRol('admin'))
                            <p>Admin</p>
                        @elseif($user->hasRol('user'))
                            <p>Usuario</p>
                        @else
                            <p>Sin rol asignado</p>
                        @endif
                    </td>
                    <td>
                        <p>{{ $user->created_at->format('d/m/Y H:i') }}</p>
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
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
    <div class="container mt-4">
        {{ $users->links() }}
    </div>
@endif

@endsection
