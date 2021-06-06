<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('photo', 30)->nullable();
            $table->string('firstName', 30)->nullable();
            $table->string('lastName', 30)->nullable();
            $table->date('bod')->nullable();
            $table->string('telp', 15)->nullable();
            $table->string('alamat', 200)->nullable();
            $table->string('kota', 30)->nullable();
            $table->string('provinsi', 30)->nullable();
            $table->string('kodepos', 6)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
