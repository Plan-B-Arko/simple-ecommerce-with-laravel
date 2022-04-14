<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'emamaincategory',
        'status',
        'discount_id',
    ];

    public function discount()
    {
        return $this->hasOne(Discount::class, 'id', 'discount_id');
    }
}
