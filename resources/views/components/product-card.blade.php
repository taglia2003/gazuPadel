@props(['product'])

<article class="gz-card @if(empty($product['img'])) gz-card--ph @endif">
    <div class="gz-card-media @if(empty($product['img'])) gz-card-media--ph @endif">
        @if(!empty($product['tag']))
            <span class="gz-tag">{{ $product['tag'] }}</span>
        @endif

        @if(!empty($product['img']))
            <img src="{{ asset('images/products/'.$product['img']) }}" alt="{{ $product['name'] }}" loading="lazy">
        @else
            <span class="gz-ph-mark">{{ $product['mark'] ?? 'GZ' }}</span>
        @endif
    </div>
    <div class="gz-card-body">
        <p class="gz-card-cat">{{ $product['cat'] }}</p>
        <h3 class="gz-card-name">{{ $product['name'] }}</h3>
        <div class="gz-card-prices">
            @if(!empty($product['price']))
                <span class="gz-price">${{ number_format($product['price'], 0, ',', '.') }}</span>
                @if(!empty($product['oldPrice']))
                    <span class="gz-price-old">${{ number_format($product['oldPrice'], 0, ',', '.') }}</span>
                @endif
            @else
                <span class="gz-price">Consultar</span>
            @endif
        </div>
    </div>
</article>
