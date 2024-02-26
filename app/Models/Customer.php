<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

protected $table = 'customers';
// في موديل Customer
protected $fillable = ['branch', 'country', 'mobileNumber', 'mobileNumber2', 'name', 'apartmentNumber', 'buildingNumber', 'address', 'discount', 'email', 'taxNumber', 'otherData'];


}
