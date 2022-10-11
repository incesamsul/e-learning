<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('id_keranjang');
            $table->unsignedBigInteger('id_user');
            $table->unsignedInteger('id_pelajaran');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_pelajaran')->references('id_pelajaran')->on('pelajaran')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}
