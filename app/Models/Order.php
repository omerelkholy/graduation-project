<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'region_id', 'client_name', 'client_phone', 'client_city',
        'shipping_type', 'payment_type', 'products', 'status', 'total_price', 'total_weight'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function region(): BelongsTo
    {
        return  $this->belongsTo(Region::class);
    }

    public function orderDeliveries(): HasMany
    {
        return $this->hasMany(OrderDelivery::class);
    }

    

}
