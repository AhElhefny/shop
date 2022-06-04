<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_rates', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->tinyInteger('amount')->nullable();
            $table->text('review')->nullable();
            $table->boolean('favorite')->default(0);
            $table->primary(array('product_id','user_id'));
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
        Schema::dropIfExists('fav_rates');
    }
}
