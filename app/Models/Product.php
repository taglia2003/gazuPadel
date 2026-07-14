<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name', 'slug', 'category', 'description', 'price', 'old_price',
    'image', 'tag', 'is_new', 'is_bestseller', 'active',
])]
class Product extends Model
{
    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'old_price' => 'integer',
            'is_new' => 'boolean',
            'is_bestseller' => 'boolean',
            'active' => 'boolean',
        ];
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function resolveRouteBinding($value, $field = null): ?self
    {
        return $this->where($field ?? 'slug', $value)->where('active', true)->first();
    }

    public function getInStockAttribute(): bool
    {
        return $this->variants->sum('stock') > 0;
    }

    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }
}
