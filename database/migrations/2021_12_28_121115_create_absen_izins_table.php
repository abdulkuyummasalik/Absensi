<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenIzinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen_izins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis_id');
            $table->unsignedBigInteger('absen_id');
            $table->tinyText('alasan_i');
            $table->timestamps();
            
            $table->foreign('nis_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('absen_id')->references('id')->on('absens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absen_izins');
    }
}
