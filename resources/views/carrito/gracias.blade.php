@extends('layouts.app')

@section('title', 'Gracias por tu compra')

@section('content')
<div class="container my-5 text-center">
    <h1 class="mb-4">¡Gracias por tu compra!</h1>
    <p>El resumen de tu compra será enviado a tu correo electrónico.</p>
    <a href="{{ route('products') }}" class="btn btn-primary mt-3">Seguir Comprando</a>
</div>
@endsection
