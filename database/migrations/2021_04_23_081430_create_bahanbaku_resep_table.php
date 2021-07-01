<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanbakuResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahanbaku_resep', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_bahanbaku')->unsigned();
            $table->foreign('id_bahanbaku')->references('id')->on('bahanbakus');
            $table->integer('jumlah');
            $table->bigInteger('id_resep')->unsigned();
            $table->foreign('id_resep')->references('id')->on('reseps')->onDelete('cascade');
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
        Schema::dropIfExists('bahanbaku_resep');
    }
}
