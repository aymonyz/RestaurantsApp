<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInvoiceData extends Model
{
    use HasFactory;
    protected $fillable = ['deliveryDate', 'invoiceNote', 'bottomNote1', 'bottomNote2'];
}
