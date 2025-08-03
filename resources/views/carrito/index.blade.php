@extends('layouts.app')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container my-5 py-5">
    <h1 class="display-4 fw-bold text-center mb-5 text-shadow text-primary">Carrito de Compras</h1>

    @if(session('success'))
    <div class="alert alert-success rounded-3 shadow-sm">{{ session('success') }}</div>
    @endif

    @if(is_array($cart) && count($cart) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Talle</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $key => $item)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ Storage::url($item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; border-radius: 5px;">
                            <span class="ms-3">{{ $item['name'] }}</span>
                        </div>
                    </td>
                    <td>{{ $item['size'] }}</td>
                    <td>${{ number_format($item['price'], 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('carrito.updateQuantity', $key) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control shadow-sm" style="width: 60px;">
                            <button type="submit" class="btn btn-secondary btn-sm mt-2 rounded-pill">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('carrito.remove', $key) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm rounded-pill btn-confirm-delete" data-item="{{ $item['name'] }}">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <h4 class="fw-bold text-primary">Total: ${{ number_format($totalPrice, 2, ',', '.') }}</h4>
        <div>
            <a href="{{ route('products') }}" class="btn btn-secondary rounded-pill me-2">Seguir comprando</a>
            <a href="{{ route('carrito.checkout') }}" class="btn btn-primary rounded-pill me-2">Finalizar compra</a>
            <form action="{{ route('carrito.clear') }}" method="POST" class="clear-form d-inline">
                @csrf
                <button type="button" class="btn btn-danger rounded-pill btn-confirm-clear">Vaciar Carrito</button>
            </form>
        </div>
    </div>
    @else
    <div class="text-center py-5 bg-light rounded-3 shadow-sm">
        <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
        <h3 class="fw-bold text-dark mb-3">¡Tu carrito está vacío!</h3>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">Parece que aún no has añadido productos. Explorá nuestra colección de zapatillas urbanas y de skate para encontrar el par perfecto.</p>
        <a href="{{ route('products') }}" class="btn btn-primary btn-lg rounded-pill mt-3 text-decoration-none">Ver productos</a>
    </div>
    @endif
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar acción</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="confirmMessage">
                ¿Estás seguro que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger rounded-pill" id="confirmActionBtn">Sí, continuar</button>
            </div>
        </div>
    </div>
</div>

<style>
    .text-shadow {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
</style>

<script>
    let currentForm = null;

    document.querySelectorAll('.btn-confirm-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('confirmMessage').textContent =
                `¿Estás seguro que deseas eliminar "${this.dataset.item}" del carrito?`;
            currentForm = this.closest('form');
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
        });
    });

    document.querySelector('.btn-confirm-clear')?.addEventListener('click', function() {
        document.getElementById('confirmMessage').textContent =
            "¿Estás seguro que deseas vaciar todo el carrito?";
        currentForm = this.closest('form');
        const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
        modal.show();
    });

    document.getElementById('confirmActionBtn').addEventListener('click', function() {
        if (currentForm) currentForm.submit();
    });
</script>
@endsection