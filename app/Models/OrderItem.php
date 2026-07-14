<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'order_id', 'product_id', 'product_variant_id', 'product_name',
    'variant_color', 'variant_size', 'unit_price', 'quantity',
])]
class OrderItem extends Model
{
    protected function casts(): array
    {
        return [
            'unit_price' => 'integer',
            'quantity' => 'integer',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getSubtotalAttribute(): int
    {
        return $this->unit_price * $this->quantity;
    }
}
