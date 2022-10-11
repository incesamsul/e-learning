<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_pelajaran', function (Blueprint $table) {
            $table->increments('id_peserta_pelajaran');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedInteger('id_pelajaran');
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
            $table->foreign('id_mahasiswa')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('peserta_pelajaran');
    }
}
