<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalPgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_pg', function (Blueprint $table) {
            $table->increments('id_soal_pg');
            $table->unsignedInteger('id_quiz');
            $table->string('soal');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->enum('kuci', ['a', 'b', 'c', 'd']);
            $table->timestamps();
            $table->foreign('id_quiz')->references('id_quiz')->on('quiz')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal_pg');
    }
}
