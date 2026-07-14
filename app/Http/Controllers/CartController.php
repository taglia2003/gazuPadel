<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use RuntimeException;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = Cart::current();
        $items = $cart->items()->with('variant.product')->get();
        $total = $items->sum->subtotal;

        return view('cart.index', compact('items', 'total'));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'variant_id' => ['required', 'integer', 'exists:product_variants,id'],
            'quantity' => ['nullable', 'integer', 'min:1', 'max:20'],
        ]);

        $variant = ProductVariant::findOrFail($data['variant_id']);
        $quantity = $data['quantity'] ?? 1;

        if ($variant->stock < 1) {
            return response()->json(['message' => 'Sin stock disponible.'], 422);
        }

        $cart = Cart::current();

        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_variant_id' => $variant->id,
        ]);
        $item->quantity = min($variant->stock, ($item->exists ? $item->quantity : 0) + $quantity);
        $item->save();

        return response()->json([
            'count' => $cart->items()->sum('quantity'),
        ]);
    }

    public function update(Request $request, CartItem $cartItem): RedirectResponse
    {
        abort_unless($cartItem->cart_id === Cart::current()->id, 404);

        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:20'],
        ]);

        $cartItem->quantity = min($data['quantity'], $cartItem->variant->stock);
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function destroy(CartItem $cartItem): RedirectResponse
    {
        abort_unless($cartItem->cart_id === Cart::current()->id, 404);

        $cartItem->delete();

        return redirect()->route('cart.index');
    }

    public function checkout(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'customer_name' => ['nullable', 'string', 'max:120'],
        ]);

        $cart = Cart::current();
        $items = $cart->items()->with('variant.product')->get();

        if ($items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        try {
            $order = DB::transaction(function () use ($items, $cart, $data) {
                foreach ($items as $item) {
                    $affected = ProductVariant::where('id', $item->product_variant_id)
                        ->where('stock', '>=', $item->quantity)
                        ->decrement('stock', $item->quantity);

                    if (! $affected) {
                        throw new RuntimeException(
                            'El stock de "' . $item->variant->product->name . ' (' . $item->variant->color . ', ' . $item->variant->size . ')" cambió. Revisá tu carrito.'
                        );
                    }
                }

                $order = Order::create([
                    'cart_token' => $cart->cart_token,
                    'customer_name' => $data['customer_name'] ?? null,
                    'total' => $items->sum->subtotal,
                ]);

                foreach ($items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->variant->product_id,
                        'product_variant_id' => $item->variant->id,
                        'product_name' => $item->variant->product->name,
                        'variant_color' => $item->variant->color,
                        'variant_size' => $item->variant->size,
                        'unit_price' => $item->variant->product->price,
                        'quantity' => $item->quantity,
                    ]);
                }

                $cart->items()->delete();

                return $order;
            });
        } catch (RuntimeException $e) {
            return redirect()->route('cart.index')->with('error', $e->getMessage());
        }

        $number = config('services.whatsapp.number');
        $confirmationUrl = route('orders.show', $order);
        $message = "Hola GAZÚ! Quiero confirmar mi pedido #{$order->id} — "
            . $items->count() . ' producto' . ($items->count() === 1 ? '' : 's') . ', total ' . $order->formatted_total . ".\n"
            . "Detalle: {$confirmationUrl}";

        return redirect()->away('https://wa.me/' . $number . '?text=' . rawurlencode($message));
    }
}
