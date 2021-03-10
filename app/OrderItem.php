<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product',
        'price',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
