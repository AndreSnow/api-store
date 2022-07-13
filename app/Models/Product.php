<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'store_id',
        'active'
    ];

    public function getPriceAttribute($value)
    {
        return $this->attributes['price'] = 'R$'. number_format($value, 2, ',', '.');
    }
}
