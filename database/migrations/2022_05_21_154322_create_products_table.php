<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('amount')->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

//            $table->unsignedBigInteger('rate_id');
//            $table->foreign('rate_id')->references('id')->on('rates');
//
//            $table->unsignedBigInteger('color_id');
//            $table->foreign('color_id')->references('id')->on('colors');
//
//            $table->unsignedBigInteger('size_id');
//            $table->foreign('size_id')->references('id')->on('sizes');
//
////            $table->unsignedBigInteger('favourite_id');
////            $table->foreign('favourite_id')->references('id')->on('favourites');
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
