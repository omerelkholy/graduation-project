<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'region_id',
        'client_name',
        'client_phone',
        'client_city',
        'shipping_type',
        'payment_type',
        'products',
        'status',
        'order_price',
        'shipping_price',
        'total_price',
        'total_weight'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function region(): BelongsTo
    {
        return  $this->belongsTo(Region::class);
    }

    public function orderDelivery(): HasMany
    {
        return $this->hasMany(OrderDelivery::class);
    }

    public const STATUS = [
        'pending' => 'pending',
        'rejected' => 'rejected',
        'processing' => 'in process',
        'on_shipping' => 'Delivered to representative',
        'shipped' => 'delivered',
        'partially_delivered' => 'partially delivered',
        'cancelled_by_client' => 'Cancelled by recipient',
        'cannot_reach' => 'cannot reach',
        'rejected_with_payment' => 'rejected with_payment',
        'rejected_with_partial_payment' => 'Rejected with part payment',
        'rejected_without_payment' => 'Rejected and payment was not made'
    ];

    public const SHIPPING_TYPES = [
        'normal' => 'normal shipping',
        'shipping_in_24_hours' => 'shipping in 24 hours',
        'shipping_in_15_days' => 'shipping in 15 days'
    ];

    public const PAYMENT_TYPES = [
        'on_delivery' => 'collection interface',
        'online_payment' => 'advance payment',
        'before_shipping' => 'Parcel for Parcel'
    ];

    protected $casts = [
        'products' => 'array',
        'order_price' => 'decimal:2',
        'shipping_price' => 'decimal:2',
        'total_price' => 'decimal:2',
        'total_weight' => 'decimal:2',
    ];

    protected function products(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true) ?? [],
            set: fn($value) => is_array($value) ? json_encode($value) : $value
        );
    }
}
