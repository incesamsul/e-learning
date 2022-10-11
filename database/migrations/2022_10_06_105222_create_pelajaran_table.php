<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelajaran', function (Blueprint $table) {
            $table->increments('id_pelajaran');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedInteger('id_kategori');
            $table->string('nama_pelajaran');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->timestamps();
            $table->foreign('id_dosen')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelajaran');
    }
}
