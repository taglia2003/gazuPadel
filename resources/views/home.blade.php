@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="gz-hero" id="top">
  <img src="{{ asset('images/sections/gz-hero.jpg') }}" alt="Mural GAZÚ Padel Club">
  <div class="gz-hero-shade"></div>
  <div class="gz-wrap gz-hero-inner">
    <p class="gz-hero-kicker">Nueva colección 2026 · Dr. Zavalla 1761, Santa Fe</p>
    <h1 class="gz-hero-title">Equipate como<br>un Gazú</h1>
    <p class="gz-hero-sub">Tienda oficial del complejo GAZÚ Padel Club. Indumentaria, gorras y accesorios para vivir el pádel todos los días.</p>
    <div class="gz-hero-cta">
      <a class="gz-btn gz-btn--blue" href="#novedades">Ver indumentaria <i class="ti ti-arrow-right"></i></a>
      <a class="gz-btn gz-btn--ghost" href="#complejo">Conocé el complejo</a>
    </div>
  </div>
</section>

<!-- CATEGORY ICONS -->
<section class="gz-cats">
  <div class="gz-wrap gz-cats-row">
    @foreach($categories as $cat)
      <x-category-icon :icon="$cat['icon']" :label="$cat['label']" :href="$cat['href']" />
    @endforeach
  </div>
</section>

<!-- NOVEDADES -->
<section class="gz-sec" id="novedades">
  <div class="gz-wrap">
    <div class="gz-sec-head">
      <h2><i class="ti ti-star-filled"></i>Novedades</h2>
      <a class="gz-see" href="{{ route('products.index', ['is_new' => 1]) }}">Ver todos &rarr;</a>
    </div>
    <div class="gz-grid">
      @foreach($novedades as $product)
        <x-product-card :product="$product" />
      @endforeach
    </div>
  </div>
</section>

<!-- MAS VENDIDA -->
<section class="gz-sec">
  <div class="gz-wrap">
    <div class="gz-sec-head">
      <h2>Indumentaria más vendida</h2>
      <a class="gz-see" href="{{ route('products.index', ['category' => 'Indumentaria', 'bestseller' => 1]) }}">Ver todos ({{ count($masVendidas) }}) &rarr;</a>
    </div>
    <div class="gz-grid">
      @foreach($masVendidas as $product)
        <x-product-card :product="$product" />
      @endforeach
    </div>
  </div>
</section>

<!-- AD BANNER -->
<section class="gz-adbanner">
  <div class="gz-wrap">
    <div class="gz-adbanner-inner">
      <img src="{{ asset('images/sections/visit-bg.jpg') }}" alt="">
      <div class="gz-adbanner-shade"></div>
      <div class="gz-ad-l">
        <p class="gz-ad-kicker">Espacio publicitario</p>
        <p class="gz-ad-title"><i class="ti ti-star-filled"></i>TU MARCA ACÁ</p>
      </div>
      <div class="gz-ad-r">
        <p class="gz-ad-cta">Comunicate con nosotros</p>
        <p class="gz-ad-mail">gazu.padel@gmail.com</p>
      </div>
    </div>
  </div>
</section>

<!-- GORRAS -->
<section class="gz-sec">
  <div class="gz-wrap">
    <div class="gz-sec-head">
      <h2>Gorras GAZÚ</h2>
      <a class="gz-see" href="{{ route('products.index', ['category' => 'Gorras']) }}">Ver todas &rarr;</a>
    </div>
    <div class="gz-grid">
      @foreach($gorras as $product)
        <x-product-card :product="$product" />
      @endforeach
    </div>
  </div>
</section>

<!-- MURAL / MARCA -->
<section class="gz-mural">
  <img src="{{ asset('images/sections/mural-bg.jpg') }}" alt="Mural GAZÚ">
  <div class="gz-mural-shade"></div>
  <div class="gz-wrap gz-mural-inner">
    <span class="gz-mural-cap">Marca registrada</span>
    <h2 class="gz-mural-title">Un escudo. <span class="blue">Una familia.</span></h2>
    <p class="gz-mural-sub">El escudo GAZÚ nació en Santa Fe y hoy lo llevan cientos de jugadores dentro y fuera de la cancha.</p>
  </div>
</section>

<!-- TRUST BADGES -->
<section class="gz-trust">
  <div class="gz-wrap gz-trust-grid">
    @foreach($trust as $item)
      <div class="gz-trust-item">
        <i class="ti {{ $item['icon'] }}"></i>
        <div><h4>{{ $item['title'] }}</h4><p>{{ $item['sub'] }}</p></div>
      </div>
    @endforeach
  </div>
</section>

<!-- VISIT / COMPLEJO -->
<section class="gz-visit" id="complejo">
  <div class="gz-wrap gz-visit-grid">
    <div class="gz-visit-media">
      <img src="{{ asset('images/sections/fachada.jpg') }}" alt="Fachada del complejo GAZÚ">
      <span class="gz-visit-pin"><i class="ti ti-map-pin"></i>Dr. Zavalla 1761, Santa Fe</span>
    </div>
    <div class="gz-visit-copy">
      <p class="gz-visit-label">// El complejo</p>
      <h2>Vení a conocerlo</h2>
      <p class="sub">Cuatro canchas de cristal, torneos todas las semanas y una tienda con todo lo que necesitás para jugar. Pasá, conocé las canchas y llevate tu equipo.</p>
      <div class="gz-visit-rows">
        <div class="gz-visit-row"><span class="gz-visit-rt">Dirección</span><span class="gz-visit-rv"><i class="ti ti-map-pin"></i>Dr. Zavalla 1761, Santa Fe</span></div>
        <div class="gz-visit-row"><span class="gz-visit-rt">Horarios</span><span class="gz-visit-rv"><i class="ti ti-clock"></i>Lun a Sáb · 9:00 – 24:00</span></div>
        <div class="gz-visit-row"><span class="gz-visit-rt">Contacto</span><span class="gz-visit-rv"><i class="ti ti-mail"></i>gazu.padel@gmail.com</span></div>
        <div class="gz-visit-row"><span class="gz-visit-rt">WhatsApp</span><span class="gz-visit-rv"><i class="ti ti-brand-whatsapp"></i>+3424876555</span></div>
      </div>
      <a class="gz-btn gz-btn--blue" href="https://wa.me/5493424876555" target="_blank" rel="noopener">Escribinos por WhatsApp <i class="ti ti-arrow-up-right"></i></a>
    </div>
  </div>
  <div class="gz-wrap">
    <div class="gz-visit-minimap">
      <iframe src="https://maps.google.com/maps?q=Dr.+Zavalla+1761,+Santa+Fe,+Argentina&z=16&output=embed"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" title="Ubicación GAZÚ Padel Club"></iframe>
    </div>
  </div>
</section>

@endsection
