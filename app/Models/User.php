<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected static function boot()
    {
        parent::boot();

        // عند إنشاء مستخدم جديد
        static::created(function ($user) {
            if ($user->role === 'delivery_man') {
                // إدراج المندوب في جدول region_deliveries
                RegionDelivery::create([
                    'user_id' => $user->id,
                    'region_id' => request('region_id'), // تأكدي من أن region_id موجود في الطلب
                ]);

                // تحديث حالة المنطقة إلى active
                Region::where('id', request('region_id'))->update(['status' => 'active']);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'company_name', 'address', 'gender', 'phone'
    ];
<<<<<<< HEAD
    
=======
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    
    public function regionDelivery()
{
    return $this->hasOne(RegionDelivery::class, 'user_id');
}

    
    public function orderDeliveries(): HasMany
    {
        return $this->hasMany(OrderDelivery::class);
    }
    public function assignedOrders()
    {
        return $this->hasMany(OrderDelivery::class, 'user_id');
    }

    public function regions()
{
    return $this->belongsToMany(Region::class, 'region_deliveries', 'user_id', 'region_id');
}


<<<<<<< HEAD

=======
>>>>>>> f97b42c085fa75230f9c280eb4bcafe320ab6d67
}
