<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = $this->applyFilters(Product::query(), $request)
            ->where('active', true)
            ->with('variants')
            ->get();

        $filterOptions = [
            'categories' => config('catalog.categories'),
            'genders' => Product::query()->distinct()->orderBy('gender')->pluck('gender'),
            'sports' => Product::query()->distinct()->orderBy('sport')->pluck('sport'),
            'colors' => ProductVariant::query()->select('color', 'color_hex')->distinct()->orderBy('color')->get(),
            'sizes' => ProductVariant::query()->distinct()
                ->orderByRaw("FIELD(size, 'S','M','L','XL','Único')")
                ->pluck('size'),
            'price_min' => (int) (Product::query()->min('price') ?? 0),
            'price_max' => (int) (Product::query()->max('price') ?? 0),
        ];

        $initialFilters = [
            'q' => $request->input('q', ''),
            'category' => (array) $request->input('category', []),
            'gender' => (array) $request->input('gender', []),
            'sport' => (array) $request->input('sport', []),
            'color' => (array) $request->input('color', []),
            'size' => (array) $request->input('size', []),
            'price_min' => $request->input('price_min', ''),
            'price_max' => $request->input('price_max', ''),
            'is_new' => $request->boolean('is_new'),
            'bestseller' => $request->boolean('bestseller'),
        ];

        return view('products.index', compact('products', 'filterOptions', 'initialFilters'));
    }

    public function search(Request $request): JsonResponse
    {
        $products = $this->applyFilters(Product::query(), $request)
            ->where('active', true)
            ->with('variants')
            ->get();

        return response()->json($products->map(fn (Product $product) => [
            'id' => $product->id,
            'slug' => $product->slug,
            'name' => $product->name,
            'category' => $product->category,
            'image' => $product->image ? asset('images/products/' . $product->image) : null,
            'tag' => $product->tag,
            'in_stock' => $product->in_stock,
            'formatted_price' => $product->formatted_price,
            'old_price' => $product->old_price,
            'formatted_old_price' => $product->formatted_old_price,
        ]));
    }

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
                'gallery' => $variant->images
                    ? collect($variant->images)->map(fn ($img) => asset('images/products/' . $img))->all()
                    : ($variant->display_image ? [asset('images/products/' . $variant->display_image)] : []),
            ]),
        ]);
    }

    /**
     * Color y talle filtran de forma independiente: un producto matchea si
     * alguna variante tiene ese color y alguna variante tiene ese talle,
     * no necesariamente la misma variante (comportamiento estandar de filtro
     * de catalogo).
     */
    private function applyFilters(Builder $query, Request $request): Builder
    {
        return $query
            ->when($request->filled('q'), fn (Builder $q) => $q->where('name', 'like', '%' . $request->input('q') . '%'))
            ->when($request->filled('category'), fn (Builder $q) => $q->whereIn('category', (array) $request->input('category')))
            ->when($request->filled('gender'), fn (Builder $q) => $q->whereIn('gender', (array) $request->input('gender')))
            ->when($request->filled('sport'), fn (Builder $q) => $q->whereIn('sport', (array) $request->input('sport')))
            ->when($request->filled('color'), fn (Builder $q) => $q->whereHas(
                'variants',
                fn (Builder $v) => $v->whereIn('color', (array) $request->input('color'))
            ))
            ->when($request->filled('size'), fn (Builder $q) => $q->whereHas(
                'variants',
                fn (Builder $v) => $v->whereIn('size', (array) $request->input('size'))
            ))
            ->when($request->filled('price_min'), fn (Builder $q) => $q->where('price', '>=', (int) $request->input('price_min')))
            ->when($request->filled('price_max'), fn (Builder $q) => $q->where('price', '<=', (int) $request->input('price_max')))
            ->when($request->boolean('is_new'), fn (Builder $q) => $q->where('is_new', true))
            ->when($request->boolean('bestseller'), fn (Builder $q) => $q->where('is_bestseller', true));
    }
}
