<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis_id');
            $table->date('tgl');
            $table->time('jam_kedatangan')->nullable();
            $table->time('jam_kepulangan')->nullable();
            $table->enum('ket', ['hadir', 'telat', 'sakit', 'izin', 'alpa']);
            $table->enum('pulang', ['sudah', 'belum'])->nullable();
            $table->timestamps();

            $table->foreign('nis_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absens');
    }
}
