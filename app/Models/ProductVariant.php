<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['product_id', 'color', 'color_hex', 'size', 'stock', 'sku', 'image'])]
class ProductVariant extends Model
{
    protected function casts(): array
    {
        return [
            'stock' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getDisplayImageAttribute(): ?string
    {
        return $this->image ?? $this->product?->image;
    }
}
