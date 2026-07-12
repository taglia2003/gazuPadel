<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'GAZÚ Padel Club · Tienda Oficial · Santa Fe')</title>
<meta name="description" content="@yield('description', 'Tienda oficial GAZÚ Padel Club. Indumentaria, gorras y accesorios. Complejo de pádel en Dr. Zavalla 1761, Santa Fe.')">
<link rel="icon" href="{{ asset('images/brand/escudo.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.47.0/tabler-icons.min.css">
<link rel="stylesheet" href="{{ asset('css/gazu.css') }}">
@stack('styles')
</head>
<body>

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
  <div class="gz-wrap gz-header-inner">
    <a class="gz-logo" href="{{ route('home') }}">
      <img src="{{ asset('images/brand/escudo.png') }}" alt="Escudo GAZÚ">
      <span class="gz-logo-word">GAZÚ</span>
    </a>
    <div class="gz-search">
      <i class="ti ti-search"></i>
      <input type="text" placeholder="Buscar remeras, gorras...">
    </div>
    <div class="gz-header-right">
      <i class="ti ti-search gz-search-mobile"></i>
      <a class="gz-cart" aria-label="Carrito">
        <i class="ti ti-shopping-cart"></i>
        <span class="gz-cart-badge">0</span>
      </a>
      <img class="gz-zorro" src="{{ asset('images/brand/zorro.jpg') }}" alt="Zorro GAZÚ">
    </div>
  </div>
</header>

<!-- NAV -->
<nav class="gz-nav">
  <div class="gz-wrap gz-nav-inner">
    <button class="gz-nav-link">Paletas</button>
    <button class="gz-nav-link">Indumentaria</button>
    <button class="gz-nav-link">Gorras</button>
    <button class="gz-nav-link">Accesorios</button>
    <button class="gz-nav-link">Bolsos</button>
    <button class="gz-nav-link">Hombre</button>
    <button class="gz-nav-link">Mujer</button>
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

</body>
</html>
