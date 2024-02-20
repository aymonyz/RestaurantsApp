<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable = ['src','item_id', 'description_arabic', 'description_english'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function itemPrice()
{
    return $this->belongsTo(ItemPrice::class, 'item_id');
}

    
}
