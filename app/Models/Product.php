<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function setProductPriceAttribute($value)
    {
        $this->attributes['product_price'] = ($value * 100);
    }

    public function getProductPriceAttribute($value)
    {
        return ($value / 100);
    }
}
