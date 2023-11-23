<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'date',
        'status',
        'payment_method',
        'paid_amount',
        'note',
        'supplier_name',
    ];
    protected $table = 'purchases';

    public function products()
    {
        return $this->hasMany(Products::class, 'purchase_id', 'id');
    }
}
