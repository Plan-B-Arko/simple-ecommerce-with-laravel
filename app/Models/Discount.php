<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'discount_option',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, );
    }
}
