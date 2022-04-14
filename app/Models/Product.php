<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'status',
        'category_id',
        'discount_id'
    ];

    public function ProductCategory(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function productDiscount(){
        return $this->hasOne(Discount::class, 'id', 'discount_id');
    }
}
