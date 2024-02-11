<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    use HasFactory;
    protected $table = 'items_prices';
    protected $fillable = [
        'item_name',
        'service_type',
        'urgent',
        'price',
    ];
    
}
