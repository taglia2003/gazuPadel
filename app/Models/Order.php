<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['cart_token', 'customer_name', 'public_token', 'total', 'status'])]
class Order extends Model
{
    protected function casts(): array
    {
        return [
            'total' => 'integer',
            'status' => OrderStatus::class,
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->public_token ??= (string) Str::uuid();
            $order->status ??= OrderStatus::Pending;
        });
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'public_token';
    }

    public function resolveRouteBinding($value, $field = null): ?self
    {
        return $this->where($field ?? 'public_token', $value)->first();
    }

    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total, 0, ',', '.');
    }
}
