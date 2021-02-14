<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmingroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admingroups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('admin_show'  ,['enable','disable'])->default('disable');
            $table->enum('admin_edie'  ,['enable','disable'])->default('disable');
            $table->enum('admin_add'   ,['enable','disable'])->default('disable');
            $table->enum('admin_delete',['enable','disable'])->default('disable');

            $table->enum('admin_groups_add'   ,['enable','disable'])->default('disable');
            $table->enum('admin_groups_edie'  ,['enable','disable'])->default('disable');
            $table->enum('admin_groups_show'  ,['enable','disable'])->default('disable');
            $table->enum('admin_groups_delete',['enable','disable'])->default('disable');

            $table->enum('users_add'   ,['enable','disable'])->default('disable');
            $table->enum('users_edie'  ,['enable','disable'])->default('disable');
            $table->enum('users_show'  ,['enable','disable'])->default('disable');
            $table->enum('users_delete',['enable','disable'])->default('disable');

            $table->enum('size_add'   ,['enable','disable'])->default('disable');
            $table->enum('size_edie'  ,['enable','disable'])->default('disable');
            $table->enum('size_show'  ,['enable','disable'])->default('disable');
            $table->enum('size_delete',['enable','disable'])->default('disable');

            $table->enum('molls_add'   ,['enable','disable'])->default('disable');
            $table->enum('molls_edie'  ,['enable','disable'])->default('disable');
            $table->enum('molls_show'  ,['enable','disable'])->default('disable');
            $table->enum('molls_delete',['enable','disable'])->default('disable');

            $table->enum('city_add'   ,['enable','disable'])->default('disable');
            $table->enum('city_edie'  ,['enable','disable'])->default('disable');
            $table->enum('city_show'  ,['enable','disable'])->default('disable');
            $table->enum('city_delete',['enable','disable'])->default('disable');

            $table->enum('country_add'   ,['enable','disable'])->default('disable');
            $table->enum('country_edie'  ,['enable','disable'])->default('disable');
            $table->enum('country_show'  ,['enable','disable'])->default('disable');
            $table->enum('country_delete',['enable','disable'])->default('disable');

            $table->enum('state_add'   ,['enable','disable'])->default('disable');
            $table->enum('state_edie'  ,['enable','disable'])->default('disable');
            $table->enum('state_show'  ,['enable','disable'])->default('disable');
            $table->enum('state_delete',['enable','disable'])->default('disable');

            $table->enum('maunfacturers_add'   ,['enable','disable'])->default('disable');
            $table->enum('maunfacturers_edie'  ,['enable','disable'])->default('disable');
            $table->enum('maunfacturers_show'  ,['enable','disable'])->default('disable');
            $table->enum('maunfacturers_delete',['enable','disable'])->default('disable');

            $table->enum('shipping_add'   ,['enable','disable'])->default('disable');
            $table->enum('shipping_edie'  ,['enable','disable'])->default('disable');
            $table->enum('shipping_show'  ,['enable','disable'])->default('disable');
            $table->enum('shipping_delete',['enable','disable'])->default('disable');

            $table->enum('prodact_add'   ,['enable','disable'])->default('disable');
            $table->enum('prodact_edie'  ,['enable','disable'])->default('disable');
            $table->enum('prodact_show'  ,['enable','disable'])->default('disable');
            $table->enum('prodact_delete',['enable','disable'])->default('disable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admingroups');
    }
}
