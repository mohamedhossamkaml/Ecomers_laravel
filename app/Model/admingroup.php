<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class admingroup extends Model
{
    protected $table = 'admingroups';
    protected $fillable =
    [
        'name',
        'admin_show',
        'admin_edie',
        'admin_add',
        'admin_delete',

        'admin_groups_show',
        'admin_groups_edie',
        'admin_groups_add',
        'admin_groups_delete',

        'users_add',
        'users_edie',
        'users_show',
        'users_delete',

        'size_show',
        'size_edie',
        'size_add',
        'size_delete',

        'molls_show',
        'molls_edie',
        'molls_add',
        'molls_delete',

        'city_show',
        'city_edie',
        'city_add',
        'city_delete',

        'country_show',
        'country_edie',
        'country_add',
        'country_delete',

        'state_show',
        'state_edie',
        'state_add',
        'state_delete',

        'maunfacturers_show',
        'maunfacturers_edie',
        'maunfacturers_add',
        'maunfacturers_delete',

        'shipping_show',
        'shipping_edie',
        'shipping_add',
        'shipping_delete',

        'prodact_show',
        'prodact_edie',
        'prodact_add',
        'prodact_delete',
    ];
}
