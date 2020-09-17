<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = 
    [
        'title',
        'photo',
        'content',
        'department_id',

        'trade_id',

        'manu_id',

        'color_id',

        'size',
        'size_id',

        'currency_id',

        'stock',
        'start_at',
        'price',
        'end_at',
        'start_offer_at',
        'price_offer',
        'end_offer_at',
        'other_data',
        'weight',
        'weight_id',
        'status',
        'reson',

    ];

    protected $date =['delete_at'];

    public function malls()
    {
        return $this->hasMany('App\Model\MallProduct','product_id','id');
    }
    public function mallproduct()
    {
        return $this->hasMany('App\Model\MallProduct','product_id','id');
    }
    public function related()
    {
        return $this->hasMany('App\Model\RelatedProduct','product_id','id');
    }

    public function other_data()
    {
        return $this->hasMany('App\Model\OtherData','product_id','id');
    }


    public function files()
    {
        return $this->hasMany('App\File','relation_id','id')->where('file_type','product');
    }
}


