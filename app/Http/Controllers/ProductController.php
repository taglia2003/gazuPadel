<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function quickView(Product $product): JsonResponse
    {
        $product->load('variants');

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'old_price' => $product->old_price,
            'formatted_price' => $product->formatted_price,
            'image' => $product->image ? asset('images/products/' . $product->image) : null,
            'variants' => $product->variants->map(fn ($variant) => [
                'id' => $variant->id,
                'color' => $variant->color,
                'color_hex' => $variant->color_hex,
                'size' => $variant->size,
                'stock' => $variant->stock,
                'image' => $variant->display_image ? asset('images/products/' . $variant->display_image) : null,
            ]),
        ]);
    }
}
