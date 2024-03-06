<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function items()
{
    return $this->hasMany(CartItem::class);
}
    use HasFactory;
    protected $fillable = ['discount', 'delivery', 'deliveryCost', 'urgent', 'paymentMethod', 'customerId', 'totalPrice'];

}
