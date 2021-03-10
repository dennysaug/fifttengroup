<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = [
        'company_id',
        'contact_id'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function getTotalPriceAttribute()
    {
        $items = $this->items;
        $total = 0;
        if(isset($items)) {
            foreach($items as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }

    public function getTotalQuantityAttribute()
    {
        $items = $this->items;
        $total = 0;
        if(isset($items)) {
            foreach($items as $item) {
                $total += $item['quantity'];
            }
        }
        return $total;
    }
}
