<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Datos de ejemplo: no hay stock/color/talle reales todavía.
     * Editar directamente en la base de datos (tabla product_variants)
     * cuando se tengan los valores reales.
     */
    public function run(): void
    {
        $apparelSizes = ['S', 'M', 'L', 'XL'];

        $this->createProduct([
            'name' => 'Remera Clásica',
            'category' => 'Indumentaria',
            'description' => 'Remera clásica GAZÚ, algodón peinado 24/1, escudo bordado al pecho.',
            'price' => 22500,
            'image' => 'remera-clasica-negra.png',
            'tag' => 'NUEVO',
            'is_new' => true,
            'is_bestseller' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Remera Velocidad',
            'category' => 'Indumentaria',
            'description' => 'Remera técnica GAZÚ Velocidad, estampado dry-fit de borde a borde.',
            'price' => 26900,
            'image' => 'remera-velocidad-grupo.png',
            'tag' => 'NUEVO',
            'is_new' => true,
            'is_bestseller' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
            ['color' => 'Bordó', 'color_hex' => '#7f1d1d'],
            ['color' => 'Azul', 'color_hex' => '#1e3a8a'],
            ['color' => 'Blanco', 'color_hex' => '#ffffff'],
            ['color' => 'Verde Militar', 'color_hex' => '#4d5d3a'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Remera Logo Chico',
            'category' => 'Indumentaria',
            'description' => 'Remera GAZÚ con logo chico bordado al pecho, corte clásico.',
            'price' => 18900,
            'image' => 'remera-logo-chico-blanca.png',
            'is_bestseller' => true,
        ], [
            ['color' => 'Blanco', 'color_hex' => '#ffffff'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Remera Vertical',
            'category' => 'Indumentaria',
            'description' => 'Remera GAZÚ Vertical, estampado a lo largo de la manga.',
            'price' => 19900,
            'image' => 'remera-vertical-blanca.png',
            'is_bestseller' => true,
        ], [
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'remera-vertical-blanca.png'],
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'remera-vertical-negra.png'],
            ['color' => 'Azul', 'color_hex' => '#1e3a8a', 'image' => 'remera-vertical-azul.png'],
            ['color' => 'Gris', 'color_hex' => '#9ca3af', 'image' => 'remera-vertical-gris.png'],
            ['color' => 'Verde', 'color_hex' => '#4d7c0f', 'image' => 'remera-vertical-verde.png'],
        ], $apparelSizes);

        // Sin foto real todavía (no existe archivo en public/images/products/).
        $this->createProduct([
            'name' => 'Short Clásico',
            'category' => 'Indumentaria',
            'description' => 'Short GAZÚ clásico, friza premium, bolsillos laterales.',
            'price' => 19500,
            'image' => null,
            'is_bestseller' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
        ], $apparelSizes);

        // Sin foto real todavía (no existe archivo en public/images/products/).
        $this->createProduct([
            'name' => 'Short Velocidad',
            'category' => 'Indumentaria',
            'description' => 'Short GAZÚ Velocidad, tela técnica liviana.',
            'price' => 23900,
            'image' => null,
            'is_bestseller' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Gorra Escudo Negra',
            'category' => 'Gorras',
            'description' => 'Gorra GAZÚ con escudo bordado, cierre trasero ajustable.',
            'price' => 15900,
            'image' => 'gorra-escudo-negra.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Gorra Escudo Blanca',
            'category' => 'Gorras',
            'description' => 'Gorra GAZÚ con escudo bordado, cierre trasero ajustable.',
            'price' => 15900,
            'image' => 'gorra-escudo-blanca.png',
        ], [
            ['color' => 'Blanco', 'color_hex' => '#ffffff'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Gorra Logo Zorro',
            'category' => 'Gorras',
            'description' => 'Gorra GAZÚ con logo zorro bordado, cierre trasero ajustable.',
            'price' => 15900,
            'image' => 'gorra-logo-zorro-negra.png',
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
        ], ['Único']);
    }

    private function createProduct(array $attributes, array $colors, array $sizes): void
    {
        $product = Product::create($attributes + [
            'slug' => Str::slug($attributes['name']),
            'gender' => 'Unisex',
            'sport' => 'Pádel',
        ]);

        foreach ($colors as $color) {
            foreach ($sizes as $size) {
                $product->variants()->create([
                    'color' => $color['color'],
                    'color_hex' => $color['color_hex'] ?? null,
                    'size' => $size,
                    'stock' => random_int(6, 14),
                    'image' => $color['image'] ?? null,
                ]);
            }
        }
    }
}
