<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Admin extends Authenticatable
{
    //

    protected $tabl = 'admins';

    protected $fillable = [
        'frist_name', 'last_name','group_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group_id()
    {
        return $this->hasOne('App\Model\admingroup','id','group_id');
    }
    public function group ()
    {
        return $this->hasOne('App\Model\admingroup','id','group_id');
    }
}
