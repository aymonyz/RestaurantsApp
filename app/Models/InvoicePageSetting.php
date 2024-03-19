<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePageSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_start_letter', 'max_per_letter', 'default_tax', 'default_service', 
        'auto_change_letter', 'activate_washing_cycle', 'normal_processing_time', 
        'quick_processing_time'
    ];
}
