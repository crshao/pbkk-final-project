<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->timestamps();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_bahanbaku')->unsigned();
            $table->bigInteger('id_cart')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_bahanbaku')->references('id')->on('bahanbakus');
            $table->foreign('id_cart')->references('id')->on('carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
}
