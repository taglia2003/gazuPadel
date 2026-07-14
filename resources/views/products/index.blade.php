@extends('layouts.app')

@section('title', 'Productos · GAZÚ Padel Club')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/catalog.css') }}">
@endpush

@section('content')
<section class="gz-catalog" x-data="catalogFilters(@json($initialFilters))">

  <div class="gz-wrap gz-catalog-inner">

    <button type="button" class="gz-filters-toggle" @click="drawerOpen = true">
      <i class="ti ti-filter"></i> Filtros
    </button>

    <div class="gz-filters-backdrop" x-show="drawerOpen" x-cloak @click="drawerOpen = false"></div>

    <aside class="gz-filters" :class="{ 'is-open': drawerOpen }">
      <div class="gz-filters-head">
        <h2>Filtros</h2>
        <button type="button" class="gz-filters-close" @click="drawerOpen = false" aria-label="Cerrar">
          <i class="ti ti-x"></i>
        </button>
      </div>

      <div class="gz-filter-group">
        <h4>Categoría</h4>
        @foreach($filterOptions['categories'] as $category)
          <label class="gz-filter-check">
            <input type="checkbox" value="{{ $category }}"
                   :checked="isChecked('category', '{{ $category }}')"
                   @change="toggle('category', '{{ $category }}')">
            {{ $category }}
          </label>
        @endforeach
      </div>

      <div class="gz-filter-group">
        <h4>Sexo</h4>
        @foreach($filterOptions['genders'] as $gender)
          <label class="gz-filter-check">
            <input type="checkbox" value="{{ $gender }}"
                   :checked="isChecked('gender', '{{ $gender }}')"
                   @change="toggle('gender', '{{ $gender }}')">
            {{ $gender }}
          </label>
        @endforeach
      </div>

      <div class="gz-filter-group">
        <h4>Deporte</h4>
        @foreach($filterOptions['sports'] as $sport)
          <label class="gz-filter-check">
            <input type="checkbox" value="{{ $sport }}"
                   :checked="isChecked('sport', '{{ $sport }}')"
                   @change="toggle('sport', '{{ $sport }}')">
            {{ $sport }}
          </label>
        @endforeach
      </div>

      <div class="gz-filter-group">
        <h4>Color</h4>
        <div class="gz-swatches">
          @foreach($filterOptions['colors'] as $color)
            <button type="button" class="gz-swatch" title="{{ $color->color }}"
                    :class="{ 'is-selected': isChecked('color', '{{ $color->color }}') }"
                    style="background:{{ $color->color_hex ?? '#ccc' }}"
                    @click="toggle('color', '{{ $color->color }}')"></button>
          @endforeach
        </div>
      </div>

      <div class="gz-filter-group">
        <h4>Talle</h4>
        <div class="gz-sizes">
          @foreach($filterOptions['sizes'] as $size)
            <button type="button" class="gz-size-btn"
                    :class="{ 'is-selected': isChecked('size', '{{ $size }}') }"
                    @click="toggle('size', '{{ $size }}')">{{ $size }}</button>
          @endforeach
        </div>
      </div>

      <div class="gz-filter-group">
        <h4>Precio</h4>
        <div class="gz-price-inputs">
          <input type="number" placeholder="${{ number_format($filterOptions['price_min'], 0, ',', '.') }}"
                 x-model="filters.price_min" @input="onPriceInput()">
          <span>—</span>
          <input type="number" placeholder="${{ number_format($filterOptions['price_max'], 0, ',', '.') }}"
                 x-model="filters.price_max" @input="onPriceInput()">
        </div>
      </div>

      <button type="button" class="gz-btn gz-btn--outline gz-filters-clear" @click="clearAll()">Limpiar filtros</button>
    </aside>

    <div class="gz-catalog-results">
      <div class="gz-catalog-head">
        <h1>Productos</h1>
        <span class="gz-catalog-loading" x-show="loading">Buscando…</span>
      </div>

      {{-- Grilla SSR: visible por defecto, ya filtrada segun los query params de la URL --}}
      <div class="gz-grid" x-show="!hasFiltered">
        @foreach($products as $product)
          <x-product-card :product="$product" />
        @endforeach
      </div>
      @if($products->isEmpty())
        <p class="gz-catalog-empty" x-show="!hasFiltered">No hay productos que coincidan con estos filtros todavía.</p>
      @endif

      {{-- Grilla Alpine: toma el control despues del primer filtro tocado por el usuario --}}
      <div class="gz-grid" x-show="hasFiltered" x-cloak>
        <template x-for="p in products" :key="p.id">
          <article class="gz-card" :class="{ 'gz-card--ph': !p.image }"
                   @click="$store.cart.openQuickView(p.slug)" role="button" tabindex="0">
            <div class="gz-card-media" :class="{ 'gz-card-media--ph': !p.image }">
              <span class="gz-tag" x-show="p.tag" x-text="p.tag"></span>
              <span class="gz-tag gz-tag--out" x-show="!p.in_stock">SIN STOCK</span>
              <img :src="p.image" :alt="p.name" x-show="p.image" loading="lazy">
              <span class="gz-ph-mark" x-show="!p.image">GZ</span>
            </div>
            <div class="gz-card-body">
              <p class="gz-card-cat" x-text="p.category"></p>
              <h3 class="gz-card-name" x-text="p.name"></h3>
              <div class="gz-card-prices">
                <span class="gz-price" x-text="p.formatted_price"></span>
                <span class="gz-price-old" x-show="p.old_price" x-text="p.formatted_old_price"></span>
              </div>
            </div>
          </article>
        </template>
      </div>
      <p class="gz-catalog-empty" x-show="hasFiltered && !loading && products.length === 0" x-cloak>
        No hay productos que coincidan con estos filtros todavía.
      </p>
    </div>

  </div>
</section>
@endsection
