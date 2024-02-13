<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

protected $table = 'customers';
protected $fillable = [
    'name', 'country', 'branch', 'mobileNumber', 'mobileNumber2',
    'apartmentNumber', 'buildingNumber', 'address', 'priceList',
    'discount', 'email', 'taxNumber', 'otherData',
];

}
