<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Maunfacturers extends Model
{
    protected $table = 'maunfacturers';
    protected $fillable = 
    [
        'name_ar',
        'name_en',
        'address',
        'facbook',
        'twitter',
        'website',
        'contact_name',
        'mobile',
        'email',
        'lat',
        'lng',
        'icon',
    ];
}
