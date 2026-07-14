<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['cart_token'])]
class Cart extends Model
{
    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public static function current(): self
    {
        return static::firstOrCreate([
            'cart_token' => request()->attributes->get('cart_token'),
        ]);
    }
}
