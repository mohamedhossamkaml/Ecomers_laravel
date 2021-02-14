<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

use App\Admin;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'frist_name'    => 'super',
            'last_name'     => 'Admin',
            'email'         => 'super_admin@app.com',
            'password'      => bcrypt('123456'),
        ]);

        $user->attachRole('super_admin');
    }
}

