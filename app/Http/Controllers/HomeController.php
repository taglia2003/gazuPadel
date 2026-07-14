<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $categories = [
            ['label' => 'Remeras', 'icon' => 'tshirt'],
            ['label' => 'Shorts', 'icon' => 'shorts'],
            ['label' => 'Gorras', 'icon' => 'cap'],
            ['label' => 'Casual', 'icon' => 'shirt'],
            ['label' => 'Accesorios', 'icon' => 'socks'],
        ];

        $novedades = [
            ['name' => 'Remera GAZU Clásica', 'cat' => 'Indumentaria', 'price' => 22500, 'img' => 'remera-clasica-negra.png', 'tag' => 'NUEVO'],
            ['name' => 'Remera GAZU Velocidad', 'cat' => 'Indumentaria', 'price' => 26900, 'img' => 'remera-velocidad-grupo.png', 'tag' => 'NUEVO'],
            ['name' => 'Gorra Escudo Negra', 'cat' => 'Gorras', 'price' => 15900, 'img' => 'gorra-escudo-negra.png', 'tag' => 'NUEVO'],
        ];

        $masVendidas = [
            ['name' => 'Remera Clásica', 'cat' => 'Indumentaria', 'price' => 22500, 'img' => 'remera-clasica-negra.png'],
            ['name' => 'Remera Velocidad', 'cat' => 'Indumentaria', 'price' => 26900, 'img' => 'remera-velocidad-grupo.png'],
            ['name' => 'Short Clásico', 'cat' => 'Indumentaria', 'price' => 19500, 'img' => null, 'mark' => 'S'],
            ['name' => 'Remera Logo Chico', 'cat' => 'Indumentaria', 'price' => 18900, 'img' => 'remera-logo-chico-blanca.png'],
            ['name' => 'Remera Vertical Blanca', 'cat' => 'Indumentaria', 'price' => 19900, 'img' => 'remera-vertical-blanca.png'],
            ['name' => 'Short Velocidad', 'cat' => 'Indumentaria', 'price' => 23900, 'img' => null, 'mark' => 'S'],
        ];

        $gorras = [
            ['name' => 'Gorra Escudo Negra', 'cat' => 'Gorras', 'price' => 15900, 'img' => 'gorra-escudo-negra.png'],
            ['name' => 'Gorra Escudo Blanca', 'cat' => 'Gorras', 'price' => 15900, 'img' => 'gorra-escudo-blanca.png'],
            ['name' => 'Gorra Logo Zorro', 'cat' => 'Gorras', 'price' => 15900, 'img' => 'gorra-logo-zorro-negra.png'],
        ];

        $trust = [
            ['icon' => 'ti-truck-delivery', 'title' => 'Envío gratis', 'sub' => 'Desde $150.000'],
            ['icon' => 'ti-cash-banknote', 'title' => 'Transferencia', 'sub' => '10% OFF'],
            ['icon' => 'ti-building-bank', 'title' => 'Cuotas', 'sub' => 'Hasta 6 sin interés'],
            ['icon' => 'ti-replace', 'title' => 'Cambios', 'sub' => '30 días'],
        ];

        return view('home', compact('categories', 'novedades', 'masVendidas', 'gorras', 'trust'));
    }
}
