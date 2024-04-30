<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'owner',
        'address',
        'phone_number',
        'pet_name',
        'pet_gender',
        'pet_age',
        'pet_food',
        'note',
        'vaccine',
        'medcheck',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->morphOne(Order::class, 'service');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
