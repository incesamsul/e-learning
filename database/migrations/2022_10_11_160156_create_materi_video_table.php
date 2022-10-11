<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_video', function (Blueprint $table) {
            $table->increments('id_materi_video');
            $table->unsignedInteger('id_pelajaran');
            $table->string('judul_video');
            $table->string('deskripsi_video');
            $table->string('video');
            $table->timestamps();
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
        Schema::dropIfExists('materi_video');
    }
}
