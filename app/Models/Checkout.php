<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'payment_method',
        'payment_status',
        'status',
        'order_manage',
        'cart_id',
        'user_id'
    ];


    public function cart(){
        return $this->hasOne(Cart::class, 'id', 'cart_id');
    }
}
