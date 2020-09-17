<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Moll extends Model
{
    protected $table = 'molls'; 
    protected $fillable = [ 

        'name_ar',
        'name_en',
        'country_id',
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

    public function country_id()
    {
        return $this->hasOne('App\Model\Country','id','country_id');
    } 
}
