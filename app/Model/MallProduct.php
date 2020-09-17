<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MallProduct extends Model
{
    protected $table    = 'mall_products';
    protected $fillable = 
    [
        'product_id',
        'molls_id',
    ];

    public function mall_product()
    {
        return $this->hasMany('App\Model\Moll','id','molls_id');
    }

}
