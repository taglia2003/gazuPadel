@props(['product'])

<article class="gz-card @if(empty($product->image)) gz-card--ph @endif"
         @click="$store.cart.openQuickView('{{ $product->slug }}')"
         @keydown.enter="$store.cart.openQuickView('{{ $product->slug }}')"
         role="button" tabindex="0">
    <div class="gz-card-media @if(empty($product->image)) gz-card-media--ph @endif">
        @if($product->tag)
            <span class="gz-tag">{{ $product->tag }}</span>
        @endif
        @unless($product->in_stock)
            <span class="gz-tag gz-tag--out">SIN STOCK</span>
        @endunless

        @if($product->image)
            <img src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}" loading="lazy">
        @else
            <span class="gz-ph-mark">GZ</span>
        @endif
    </div>
    <div class="gz-card-body">
        <p class="gz-card-cat">{{ $product->category }}</p>
        <h3 class="gz-card-name">{{ $product->name }}</h3>
        <div class="gz-card-prices">
            <span class="gz-price">{{ $product->formatted_price }}</span>
            @if($product->old_price)
                <span class="gz-price-old">${{ number_format($product->old_price, 0, ',', '.') }}</span>
            @endif
        </div>
    </div>
</article>
