<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'base_shipping_price',
        'extra_weight_price_per_kg',
        'village_fee',
        'express_shipping_fee',
        'weight_limit'
    ];

    protected $casts = [
        'base_shipping_price' => 'float',
        'extra_weight_price_per_kg' => 'float',
        'village_fee' => 'float',
        'express_shipping_fee' => 'float',
        'weight_limit' => 'float'
    ];

    public static function getCurrentPrices()
    {
        $shippingRate = self::latest()->first();
        return $shippingRate ? $shippingRate->toArray() : null;
    }
    public static function getRatesForOrderEdit(Order $order)
    {
        $shippingRate = self::where('created_at', '<=', $order->created_at)
            ->latest()
            ->first();
        return $shippingRate ? $shippingRate->toArray() : null;
    }

    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
