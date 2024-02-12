<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'arabicName',
        'englishName',
        'abbreviatedArabicname',
        'abbreviatedEnglishname',
        'itemNumber',
        'unit',
        'is_active',
        'group'
    ];
}
