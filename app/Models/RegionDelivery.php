<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegionDelivery extends Model
{
    /** @use HasFactory<\Database\Factories\RegionDeliveryFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'region_id']; // تأكد أن الاسم مطابق تمامًا لقاعدة البيانات

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
