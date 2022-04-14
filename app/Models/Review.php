<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'star',
        'user_id',
        'product_id'
    ];

    public function reviewedProduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
