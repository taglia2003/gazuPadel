<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
