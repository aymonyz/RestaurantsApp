<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        'paymethod_arabic', 'paymethod_english', 'discount_percentage', 'total_price', 'payment_appearance'
    ];
}
