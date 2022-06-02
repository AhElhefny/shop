<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
//            $table->increments('id')->unique();
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->char('size',4);
            $table->string('color');
            $table->primary(array('product_id','size','color'));
            $table->tinyInteger('amount')->default(0);
            $table->timestamps();
        });
//        DB::unprepared('ALTER TABLE `product_attributes` DROP PRIMARY KEY, ADD PRIMARY KEY (`size`,`color`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
