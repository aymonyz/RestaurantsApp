<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function group()
{
    return $this->belongsTo('App\Models\Group', 'group', 'id');
}
public function image()
{
    return $this->hasOne(Image::class); 
    // Use hasMany if an item can have multiple images
}
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
