<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriTertulisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_tertulis', function (Blueprint $table) {
            $table->increments('id_materi_tertulis');
            $table->unsignedInteger('id_pelajaran');
            $table->string('judul_materi');
            $table->string('deskripsi_materi');
            $table->string('materi');
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
        Schema::dropIfExists('materi_tertulis');
    }
}
