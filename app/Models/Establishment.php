<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses; 

class Establishment extends Model
{
    use HasFactory;
    protected $fillable = ['Establishmentneam', 'Establishmentdecebshan', 'name'];
}
