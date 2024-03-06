<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

// protected $fillable = ['cart_id', 'name', 'price'];
    
    protected $fillable = ['cart_id', 'name', 'price', 'width', 'height', 'numberOfMeters', 'quantity'];



}
