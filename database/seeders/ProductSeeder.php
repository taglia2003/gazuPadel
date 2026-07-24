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

        $this->createProduct([
            'name' => 'Short Clásico',
            'category' => 'Indumentaria',
            'description' => 'Short GAZÚ técnico, bolsillos laterales, logo zorro estampado al costado.',
            'price' => 19500,
            'image' => 'short-frente-negro.png',
            'is_bestseller' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'short-frente-negro.png', 'images' => ['short-frente-negro.png', 'short-lateral-negro.png', 'short-trasera-negro.png']],
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'short-frente-blanco.png', 'images' => ['short-frente-blanco.png', 'short-lateral-blanco.png', 'short-trasera-blanco.png']],
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
            'name' => 'Buzo Clásico',
            'category' => 'Indumentaria',
            'description' => 'Buzo GAZÚ friza premium, cuello redondo, escudo bordado y estampado GAZÚ al frente.',
            'price' => 37900,
            'image' => 'buzo-gazu.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Azul Marino', 'color_hex' => '#1e3a8a', 'image' => 'buzo-gazu.png'],
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'buzo-gazu-blanco.png'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Canguro Clásico',
            'category' => 'Indumentaria',
            'description' => 'Canguro GAZÚ friza premium con capucha y bolsillo canguro, estampado GAZÚ al frente.',
            'price' => 42900,
            'image' => 'canguro-gazu.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Chomba Clásica',
            'category' => 'Indumentaria',
            'description' => 'Chomba GAZÚ piqué técnico, logo zorro bordado al pecho, ideal para cancha o calle.',
            'price' => 29900,
            'image' => 'chomba-gazu-azul.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Azul', 'color_hex' => '#1e3a8a', 'image' => 'chomba-gazu-azul.png'],
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'chomba-gazu-blanca.png'],
        ], $apparelSizes);

        $this->createProduct([
            'name' => 'Remera Cancha',
            'category' => 'Indumentaria',
            'description' => 'Remera GAZÚ Padel, algodón peinado, estampado de cancha de pádel en la espalda.',
            'price' => 24900,
            'image' => 'remera-cancha.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'remera-cancha.png'],
            ['color' => 'Azul', 'color_hex' => '#1e3a8a', 'image' => 'remera-cancha-azul.png'],
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'remera-cancha-blanca.png'],
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
            'name' => 'Gorra Escudo Azul',
            'category' => 'Gorras',
            'description' => 'Gorra GAZÚ con escudo bordado, cierre trasero ajustable.',
            'price' => 15900,
            'image' => 'gorra-escudo-azul.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Azul Marino', 'color_hex' => '#1e3a8a'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Bolso GAZÚ',
            'category' => 'Bolsos',
            'description' => 'Bolso deportivo GAZÚ, bolsillo lateral en malla, manija acolchada y correa ajustable, logo zorro bordado.',
            'price' => 27900,
            'image' => 'bolso-negro.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'bolso-negro.png'],
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'bolso-blanco.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Gorra Logo Zorro',
            'category' => 'Gorras',
            'description' => 'Gorra GAZÚ con logo zorro bordado, cierre trasero ajustable.',
            'price' => 15900,
            'image' => 'gorra-logo-zorro-negra.png',
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'gorra-logo-zorro-negra.png'],
            ['color' => 'Blanco', 'color_hex' => '#ffffff', 'image' => 'gorra-logo-zorro-blanca.png'],
        ], ['Único']);

        // Paletas, bolsos y pelotas de terceros: precios de referencia relevados
        // en tiendas de padel argentinas (julio 2026), ajustar cuando haya costo real.
        $this->createProduct([
            'name' => 'Paleta NOX AR',
            'category' => 'Paletas',
            'description' => 'Paleta NOX AR, forma diamante, alto rendimiento para jugadores avanzados.',
            'price' => 520000,
            'image' => 'paleta-nox-ar.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'paleta-nox-ar.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Paleta NOX ML10',
            'category' => 'Paletas',
            'description' => 'Paleta NOX ML10, forma diamante, control y potencia para juego de ataque.',
            'price' => 580000,
            'image' => 'paleta-nox-ml10.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'paleta-nox-ml10.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Paleta Babolat Viper',
            'category' => 'Paletas',
            'description' => 'Paleta Babolat Viper, forma híbrida, equilibrio entre potencia y control.',
            'price' => 480000,
            'image' => 'paleta-babolat-viper.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'paleta-babolat-viper.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Paleta Head Speed Pro',
            'category' => 'Paletas',
            'description' => 'Paleta Head Speed Pro, forma diamante, potencia para jugadores de ataque.',
            'price' => 520000,
            'image' => 'paleta-head-speed-pro.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'paleta-head-speed-pro.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Paleta Adidas Metalbone',
            'category' => 'Paletas',
            'description' => 'Paleta Adidas Metalbone, forma diamante, máxima potencia.',
            'price' => 650000,
            'image' => 'paleta-adidas-metalbone.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'paleta-adidas-metalbone.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Paleta Adidas Metalbone CTRL',
            'category' => 'Paletas',
            'description' => 'Paleta Adidas Metalbone CTRL, forma redonda, control y comodidad de juego.',
            'price' => 600000,
            'image' => 'paleta-adidas-metalbone-ctrl.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'paleta-adidas-metalbone-ctrl.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Bolso Babolat',
            'category' => 'Bolsos',
            'description' => 'Bolso paletero Babolat, compartimento térmico, capacidad para 2 paletas.',
            'price' => 180000,
            'image' => 'bolso-babolat-negro.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'bolso-babolat-negro.png'],
            ['color' => 'Verde', 'color_hex' => '#166534', 'image' => 'bolso-babolat-verde.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Bolso NOX',
            'category' => 'Bolsos',
            'description' => 'Bolso paletero NOX, compartimento térmico, bolsillo lateral para accesorios.',
            'price' => 220000,
            'image' => 'bolso-nox-negro.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Negro', 'color_hex' => '#111111', 'image' => 'bolso-nox-negro.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Bolso Bull Padel',
            'category' => 'Bolsos',
            'description' => 'Bolso paletero Bull Padel, compartimento térmico, correa ajustable.',
            'price' => 250000,
            'image' => 'bolso-bullpadel-turquesa.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Turquesa', 'color_hex' => '#14b8a6', 'image' => 'bolso-bullpadel-turquesa.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Pelotas Meta',
            'category' => 'Accesorios',
            'description' => 'Tubo x3 pelotas de pádel Meta.',
            'price' => 9900,
            'image' => 'pelotitas_meta.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'pelotitas_meta.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Pelotas ODPRO',
            'category' => 'Accesorios',
            'description' => 'Tubo x3 pelotas de pádel ODPRO.',
            'price' => 14500,
            'image' => 'pelotitas_odpro.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'pelotitas_odpro.png'],
        ], ['Único']);

        $this->createProduct([
            'name' => 'Pelotas XTRUST',
            'category' => 'Accesorios',
            'description' => 'Tubo x3 pelotas de pádel XTRUST.',
            'price' => 13900,
            'image' => 'pelotitas_xtrust.png',
            'tag' => 'NUEVO',
            'is_new' => true,
        ], [
            ['color' => 'Único', 'image' => 'pelotitas_xtrust.png'],
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
                    'images' => $color['images'] ?? null,
                ]);
            }
        }
    }
}
