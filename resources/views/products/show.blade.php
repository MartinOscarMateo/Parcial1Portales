@extends('layouts.app')

@section('title', 'Detalle de Producto')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">{{ $product->name }}</h1>

    <div class="row">
        <div class="col-md-6">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ Storage::url($product->image) }}" class="d-block w-100 rounded shadow-sm" alt="{{ $product->name }}">
                    </div>

                    @if ($product->extra_image_1)
                    <div class="carousel-item">
                        <img src="{{ Storage::url($product->extra_image_1) }}" class="d-block w-100 rounded shadow-sm" alt="{{ $product->name }}">
                    </div>
                    @endif

                    @if ($product->extra_image_2)
                    <div class="carousel-item">
                        <img src="{{ Storage::url($product->extra_image_2) }}" class="d-block w-100 rounded shadow-sm" alt="{{ $product->name }}">
                    </div>
                    @endif
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-md-6">
            <h3 class="text-muted mb-3">{{ $product->description }}</h3>
            <p class="fs-4 fw-bold text-primary"><strong>Precio:</strong> ${{ number_format($product->price, 2, ',', '.') }}</p>

            <p class="fs-5"><strong>Hasta 6 cuotas sin interés</strong></p>

            <hr>

            <p class="text-success fs-5"><strong>Envío gratis a toda la Argentina</strong></p>
            <p class="text-muted"><small>Primer cambio gratis. <br>Tienes hasta 30 días para hacerlo.</small></p>

            <div class="mt-4">
                <label for="size" class="form-label fw-semibold">Seleccionar talle</label>
                <select id="size" class="form-select shadow-sm">
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                </select>
            </div>

            <p class="fw-bold mt-3">Métodos de pago</p>
            <ul class="list-unstyled">
                <li><i class="bi bi-credit-card"></i> Mercado Pago</li>
                <li><i class="bi bi-bank"></i> Transferencia bancaria</li>
                <li><i class="bi bi-credit-card-2-front"></i> Tarjetas de crédito y débito</li>
            </ul>

            <div class="mt-4">
                <form action="{{ route('carrito.add', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ $product->image }}">
                    <input type="hidden" name="size" id="selected-size" value="35"> 

                    <button type="submit" class="btn btn-warning w-100 py-3 mt-3">
                        <i class="bi bi-cart-plus"></i> Agregar al carrito
                    </button>
                </form>

                <script>
                    document.getElementById('size').addEventListener('change', function() {
                        document.getElementById('selected-size').value = this.value;
                    });
                </script>
            </div>
        </div>
    </div>
</div>

{{-- Toast de exito --}}
@if (session('success'))
<div id="toast-success" class="position-fixed top-0 end-0 p-3" style="z-index: 1055;">
    <div class="toast align-items-center text-white bg-success border-0 show" role="alert">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        const toastEl = document.getElementById('toast-success');
        if (toastEl) toastEl.remove();
    }, 3000);
</script>
@endif

@endsection
