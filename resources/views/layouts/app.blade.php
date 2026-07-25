<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'GAZÚ Padel Club · Tienda Oficial · Santa Fe')</title>
<meta name="description" content="@yield('description', 'Tienda oficial GAZÚ Padel Club. Indumentaria, gorras y accesorios. Complejo de pádel en Dr. Zavalla 1761, Santa Fe.')">
<link rel="icon" href="{{ asset('images/brand/escudo.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/tabler-icons.min.css">
<link rel="stylesheet" href="{{ asset('css/gazu.css') }}">
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@stack('styles')
</head>
<body x-data>

<!-- TOPBAR MARQUEE -->
<div class="gz-topbar">
  <div class="gz-topbar-track">
    <div class="gz-topbar-row">
      <span class="item"><i class="ti ti-truck-delivery"></i>Envío a todo el país</span>
      <span class="item"><i class="ti ti-credit-card"></i>3 y 6 cuotas sin interés</span>
      <span class="item"><i class="ti ti-map-pin"></i>Retiro gratis en el complejo</span>
      <span class="item"><i class="ti ti-refresh"></i>Cambios en 30 días</span>
    </div>
    <div class="gz-topbar-row" aria-hidden="true">
      <span class="item"><i class="ti ti-truck-delivery"></i>Envío a todo el país</span>
      <span class="item"><i class="ti ti-credit-card"></i>3 y 6 cuotas sin interés</span>
      <span class="item"><i class="ti ti-map-pin"></i>Retiro gratis en el complejo</span>
      <span class="item"><i class="ti ti-refresh"></i>Cambios en 30 días</span>
    </div>
  </div>
</div>

<!-- HEADER -->
<header class="gz-header">
  <div class="gz-wrap gz-header-inner" x-data="{ mobileSearchOpen: false }">
    <a class="gz-logo" href="{{ route('home') }}">
      <img src="{{ asset('images/brand/escudo.png') }}" alt="Escudo GAZÚ">
      <span class="gz-logo-word">GAZÚ</span>
    </a>
    <form class="gz-search" :class="{ 'is-open': mobileSearchOpen }" method="GET" action="{{ route('products.index') }}">
      <i class="ti ti-search"></i>
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Buscar remeras, gorras...">
    </form>
    <div class="gz-header-right">
      <i class="ti ti-search gz-search-mobile" @click="mobileSearchOpen = !mobileSearchOpen"></i>
      <a class="gz-cart" aria-label="Carrito" href="{{ route('cart.index') }}">
        <i class="ti ti-shopping-cart"></i>
        <span class="gz-cart-badge" x-text="$store.cart.count"></span>
      </a>
      <img class="gz-zorro" src="{{ asset('images/brand/zorro.jpg') }}" alt="Zorro GAZÚ">
    </div>
  </div>
</header>

<!-- NAV -->
<nav class="gz-nav">
  <div class="gz-wrap gz-nav-inner">
    <a class="gz-nav-link" href="{{ route('products.index', ['category' => 'Paletas']) }}">Paletas</a>
    <a class="gz-nav-link" href="{{ route('products.index', ['category' => 'Indumentaria']) }}">Indumentaria</a>
    <a class="gz-nav-link" href="{{ route('products.index', ['category' => 'Gorras']) }}">Gorras</a>
    <a class="gz-nav-link" href="{{ route('products.index', ['category' => 'Accesorios']) }}">Accesorios</a>
    <a class="gz-nav-link" href="{{ route('products.index', ['category' => 'Bolsos']) }}">Bolsos</a>
  </div>
</nav>

@yield('content')

<!-- FOOTER -->
<footer class="gz-footer">
  <div class="gz-wrap">
    <div class="gz-footer-top">
      <div class="gz-footer-brand">
        <img src="{{ asset('images/brand/escudo.png') }}" alt="Escudo GAZÚ">
        <span class="gz-footer-word">GAZÚ</span>
      </div>
      <div class="gz-social-row">
        <a class="gz-social" style="background:#1d6fd6" aria-label="Facebook"><i class="ti ti-brand-facebook"></i></a>
        <a class="gz-social" style="background:#E1306C" aria-label="Instagram"><i class="ti ti-brand-instagram"></i></a>
        <a class="gz-social" style="background:#25D366" aria-label="WhatsApp"><i class="ti ti-brand-whatsapp"></i></a>
      </div>
      <img class="gz-footer-zorro" src="{{ asset('images/brand/zorro.jpg') }}" alt="Zorro GAZÚ">
    </div>
    <div class="gz-footer-cols">
      <div class="gz-footer-col">
        <h5>Categorías</h5>
        <p>Paletas</p><p>Indumentaria</p><p>Gorras</p><p>Accesorios</p><p>Bolsos</p>
      </div>
      <div class="gz-footer-col">
        <h5>Nosotros</h5>
        <p>Sobre GAZÚ</p><p>Canchas</p><p>Clases</p><p>Torneos</p><p>Contacto</p>
      </div>
      <div class="gz-footer-col">
        <h5>Visitanos</h5>
        <p><i class="ti ti-map-pin"></i>Dr. Zavalla 1761, Santa Fe</p>
        <p><i class="ti ti-clock"></i>Lun a Sáb · 9:00 – 24:00</p>
        <p><i class="ti ti-mail"></i>gazu.padel@gmail.com</p>
        <p><i class="ti ti-brand-whatsapp"></i>+3424876555</p>
      </div>
      <div class="gz-footer-col">
        <h5>Medios de pago</h5>
        <div class="gz-pay-row">
          <span class="gz-pay">Visa</span>
          <span class="gz-pay">Mastercard</span>
          <span class="gz-pay">MercadoPago</span>
          <span class="gz-pay">Transferencia</span>
        </div>
      </div>
    </div>
    <div class="gz-footer-bottom">
      <span>GAZÚ PADEL CLUB {{ date('Y') }} &mdash; Dr. Zavalla 1761, Santa Fe</span>
      <span class="made">Hecho en Santa Fe</span>
    </div>
  </div>
</footer>

<!-- QUICK VIEW MODAL -->
<div class="gz-modal" x-show="$store.cart.modalOpen" x-cloak style="display:none;">
  <div class="gz-modal-backdrop" @click="$store.cart.closeModal()"></div>
  <div class="gz-modal-panel" @click.outside="$store.cart.closeModal()">
    <button type="button" class="gz-modal-close" @click="$store.cart.closeModal()" aria-label="Cerrar">
      <i class="ti ti-x"></i>
    </button>

    <template x-if="$store.cart.loading && !$store.cart.product">
      <div class="gz-quickview-loading">Cargando…</div>
    </template>

    <template x-if="$store.cart.product">
      <div class="gz-quickview">
        <div class="gz-quickview-media">
          <img :src="$store.cart.currentImage" :alt="$store.cart.product.name">
          <div class="gz-quickview-thumbs" x-show="$store.cart.gallery.length > 1">
            <template x-for="(img, idx) in $store.cart.gallery" :key="idx">
              <button type="button" class="gz-quickview-thumb"
                      :class="{ 'is-selected': idx === $store.cart.galleryIndex }"
                      @click="$store.cart.selectImage(idx)">
                <img :src="img" alt="">
              </button>
            </template>
          </div>
        </div>
        <div class="gz-quickview-info">
          <h3 x-text="$store.cart.product.name"></h3>
          <p class="gz-quickview-desc" x-text="$store.cart.product.description"></p>
          <div class="gz-quickview-price" x-text="$store.cart.product.formatted_price"></div>

          <div class="gz-quickview-field">
            <label>Color</label>
            <div class="gz-swatches">
              <template x-for="c in $store.cart.colors" :key="c.color">
                <button type="button"
                        class="gz-swatch"
                        :class="{ 'is-selected': $store.cart.selectedColor === c.color }"
                        :style="c.color_hex ? ('background:' + c.color_hex) : ''"
                        :title="c.color"
                        @click="$store.cart.selectColor(c.color)"></button>
              </template>
            </div>
          </div>

          <div class="gz-quickview-field">
            <label>Talle</label>
            <div class="gz-sizes">
              <template x-for="v in $store.cart.sizesForColor($store.cart.selectedColor)" :key="v.id">
                <button type="button"
                        class="gz-size-btn"
                        :class="{ 'is-selected': $store.cart.selectedSize === v.size }"
                        :disabled="v.stock < 1"
                        @click="$store.cart.selectSize(v.size)"
                        x-text="v.size"></button>
              </template>
            </div>
          </div>

          <div class="gz-quickview-field">
            <label>Cantidad</label>
            <div class="gz-qty">
              <button type="button" @click="$store.cart.qty = Math.max(1, $store.cart.qty - 1)">−</button>
              <span x-text="$store.cart.qty"></span>
              <button type="button" @click="$store.cart.qty = Math.min($store.cart.selectedVariant?.stock ?? 20, $store.cart.qty + 1)">+</button>
            </div>
          </div>

          <p class="gz-quickview-error" x-show="$store.cart.error" x-text="$store.cart.error"></p>

          <button type="button"
                  class="gz-btn gz-btn--blue gz-quickview-add"
                  :disabled="!$store.cart.selectedVariant || $store.cart.selectedVariant.stock < 1 || $store.cart.loading"
                  @click="$store.cart.addToCart()">
            <span x-show="!$store.cart.selectedSize">Elegí un talle</span>
            <span x-show="$store.cart.selectedSize && $store.cart.selectedVariant && $store.cart.selectedVariant.stock > 0">Agregar al carrito</span>
            <span x-show="$store.cart.selectedSize && $store.cart.selectedVariant && $store.cart.selectedVariant.stock < 1">Sin stock</span>
          </button>
        </div>
      </div>
    </template>
  </div>
</div>

<div class="gz-toast" x-show="$store.cart.toastMessage" x-cloak x-text="$store.cart.toastMessage" x-transition></div>

<script>window.__cartCount = @json($cartCount ?? 0);</script>
<script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/catalog.js') }}"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>
