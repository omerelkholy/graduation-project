<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegionDelivery extends Model
{
    /** @use HasFactory<\Database\Factories\RegionDeliveryFactory> */
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['user_id', 'region_id']; 
=======
    protected $fillable = ['user_id', 'region_id']; // تأكد أن الاسم مطابق تمامًا لقاعدة البيانات
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
