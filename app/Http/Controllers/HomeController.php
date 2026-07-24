<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = [
            ['label' => 'Remeras', 'icon' => 'tshirt', 'href' => route('products.index', ['category' => 'Indumentaria'])],
            ['label' => 'Shorts', 'icon' => 'shorts', 'href' => route('products.index', ['category' => 'Indumentaria'])],
            ['label' => 'Gorras', 'icon' => 'cap', 'href' => route('products.index', ['category' => 'Gorras'])],
            ['label' => 'Casual', 'icon' => 'shirt', 'href' => route('products.index', ['category' => 'Indumentaria'])],
            ['label' => 'Accesorios', 'icon' => 'socks', 'href' => route('products.index', ['category' => 'Accesorios'])],
        ];

        $novedades = Product::with('variants')
            ->where('active', true)
            ->where('is_new', true)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $masVendidas = Product::with('variants')
            ->where('active', true)
            ->where('is_bestseller', true)
            ->orderBy('created_at')
            ->take(6)
            ->get();

        $gorras = Product::with('variants')
            ->where('active', true)
            ->where('category', 'Gorras')
            ->take(3)
            ->get();

        $trust = [
            ['icon' => 'ti-truck-delivery', 'title' => 'Envío gratis', 'sub' => 'Desde $150.000'],
            ['icon' => 'ti-cash-banknote', 'title' => 'Transferencia', 'sub' => '10% OFF'],
            ['icon' => 'ti-building-bank', 'title' => 'Cuotas', 'sub' => 'Hasta 6 sin interés'],
            ['icon' => 'ti-replace', 'title' => 'Cambios', 'sub' => '30 días'],
        ];

        return view('home', compact('categories', 'novedades', 'masVendidas', 'gorras', 'trust'));
    }
}
