<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function items()
{
    return $this->hasMany(CartItem::class,'cart_id');
}
public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }

    use HasFactory;
    protected $fillable = ['discount', 'delivery', 'deliveryCost', 'urgent', 'paymentMethod', 'customerId', 'totalPrice','pickupDate',
    'pickupTimeFrom',
    'pickupTimeTo',
    'deliveryDate',
    'deliveryTimeFrom',
    'deliveryTimeTo',
    'deliveryAddress',
      'created_by',
];

}
