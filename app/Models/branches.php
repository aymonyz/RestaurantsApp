<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    protected $fillable = ['name', 'address', /* any other fields you want to mass assign */];
    
}
