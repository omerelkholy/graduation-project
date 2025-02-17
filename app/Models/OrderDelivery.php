<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDelivery extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDeliveryFactory> */
    use HasFactory;
    protected $fillable = [
<<<<<<< HEAD
        'user_id', 
=======
        'user_id', // إضافة user_id إلى القائمة
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
        'order_id',
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
