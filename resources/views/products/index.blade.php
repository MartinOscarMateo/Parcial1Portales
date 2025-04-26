@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <h1 class="mb-4">Nuestros Productos</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Producto 1">
                <div class="card-body">
                    <h5 class="card-title">Producto 1</h5>
                    <p class="card-text">Descripción breve del producto 1.</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
    </div>
@endsection
