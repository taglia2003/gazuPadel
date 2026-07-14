@extends('layouts.app')

@section('title', 'Pedido #' . $order->id . ' · GAZÚ Padel Club')

@section('content')
<section class="gz-order-page">
  <div class="gz-wrap">
    <h1>Pedido #{{ $order->id }}</h1>
    <p>{{ $order->customer_name ? 'Gracias, ' . $order->customer_name . '.' : 'Gracias por tu pedido.' }} Este es el detalle que enviaste por WhatsApp.</p>

    <div class="gz-order-items">
      @foreach($order->items as $item)
        <div class="gz-order-item">
          <span>{{ $item->quantity }}x {{ $item->product_name }} ({{ $item->variant_color }}, {{ $item->variant_size }})</span>
          <span>${{ number_format($item->subtotal, 0, ',', '.') }}</span>
        </div>
      @endforeach
      <div class="gz-order-total">
        <span>Total</span>
        <span>{{ $order->formatted_total }}</span>
      </div>
    </div>

    <div class="gz-order-whatsapp">
      <a class="gz-btn gz-btn--blue" href="https://wa.me/{{ config('services.whatsapp.number') }}" target="_blank" rel="noopener">
        <i class="ti ti-brand-whatsapp"></i> Ir a WhatsApp
      </a>
    </div>
  </div>
</section>
@endsection
