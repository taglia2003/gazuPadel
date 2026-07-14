@extends('layouts.app')

@section('title', 'Carrito · GAZÚ Padel Club')

@section('content')
<section class="gz-cart-page">
  <div class="gz-wrap">
    <h1>Tu carrito</h1>

    @if(session('error'))
      <p class="gz-cart-error">{{ session('error') }}</p>
    @endif

    @if($items->isEmpty())
      <div class="gz-cart-empty">
        <p>Todavía no agregaste productos.</p>
        <a class="gz-btn gz-btn--blue" href="{{ route('home') }}">Ver productos</a>
      </div>
    @else
      <div class="gz-cart-grid">
        <div class="gz-cart-items">
          @foreach($items as $item)
            @php($image = $item->variant->display_image)
            <div class="gz-cart-row">
              <img src="{{ $image ? asset('images/products/'.$image) : asset('images/brand/escudo.png') }}" alt="{{ $item->variant->product->name }}">
              <div class="gz-cart-row-info">
                <h4>{{ $item->variant->product->name }}</h4>
                <p class="gz-cart-row-meta">{{ $item->variant->color }} · Talle {{ $item->variant->size }}</p>
                <form action="{{ route('cart.update', $item) }}" method="POST" class="gz-cart-row-actions">
                  @csrf
                  @method('PATCH')
                  <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->variant->stock }}">
                  <button type="submit">Actualizar</button>
                </form>
              </div>
              <span class="gz-cart-row-price">${{ number_format($item->subtotal, 0, ',', '.') }}</span>
              <form action="{{ route('cart.destroy', $item) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" aria-label="Quitar"><i class="ti ti-trash"></i></button>
              </form>
            </div>
          @endforeach
        </div>

        <div class="gz-cart-summary">
          <h3>Resumen</h3>
          <div class="gz-cart-summary-total">
            <span>Total</span>
            <span>${{ number_format($total, 0, ',', '.') }}</span>
          </div>

          <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <label for="customer_name">Nombre (opcional)</label>
            <input type="text" id="customer_name" name="customer_name" placeholder="Tu nombre">
            <button type="submit" class="gz-btn gz-btn--blue">
              <i class="ti ti-brand-whatsapp"></i> Enviar pedido por WhatsApp
            </button>
          </form>
        </div>
      </div>
    @endif
  </div>
</section>
@endsection
