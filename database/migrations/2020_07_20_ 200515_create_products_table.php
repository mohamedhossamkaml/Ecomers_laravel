<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('title')->nullable();
            $table->string('photo')->nullable();
            $table->longText('content')->nullable();

            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->bigInteger('trade_id')->unsigned()->nullable();
            $table->foreign('trade_id')->references('id')->on('trade_marks')->onDelete('cascade');

            $table->bigInteger('manu_id')->unsigned()->nullable();
            $table->foreign('manu_id')->references('id')->on('maunfacturers')->onDelete('cascade');

            // $table->bigInteger('moll_id')->unsigned()->nullable();
            // $table->foreign('moll_id')->references('id')->on('molls')->onDelete('cascade');

            $table->bigInteger('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->string('size')->nullable();
            $table->bigInteger('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

            $table->bigInteger('currency_id')->unsigned()->nullable();
            $table->foreign('currency_id')->references('id')->on('countries');


            $table->bigInteger('stock')->default(0);

            //////////// Start Pries  ///////////////////////////
            $table->date('start_at')->nullable();
            $table->decimal('price',5,2)->default(0);
            $table->date('end_at')->nullable();
            //////////// End Pries   ///////////////////////////

            //////////// Start offer ///////////////////////////
            $table->date('start_offer_at')->nullable();
            $table->decimal('price_offer',5,2)->default(0);
            $table->date('end_offer_at')->nullable();
            //////////// End offer   ///////////////////////////



            $table->longText('other_data')->nullable();


            $table->string('weight')->nullable();

            $table->bigInteger('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');

            $table->enum('status',['pending','refused','active'])->default('pending');

            $table->longText('reson')->nullable();


            $table->softDeletes();

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
        Schema::dropIfExists('products');
    }
}
