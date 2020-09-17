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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group_id()
    {
        return $this->hasOne('App\AdminGroups','id','group_id'); 
    }
    public function group ()
    {
        return $this->hasOne('App\AdminGroups','id','group_id'); 
    }
}
