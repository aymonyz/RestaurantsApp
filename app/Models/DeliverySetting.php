<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverySetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'enable_delivery_service',
        'min_delivery_order',
        'delivery_service_fee',
    ];
}
