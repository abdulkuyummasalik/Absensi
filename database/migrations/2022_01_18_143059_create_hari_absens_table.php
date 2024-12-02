<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHariAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hari_absens', function (Blueprint $table) {
            $table->id();
            $table->boolean('senin');
            $table->boolean('selasa');
            $table->boolean('rabu');
            $table->boolean('kamis');
            $table->boolean('jumat');
            $table->boolean('sabtu');
            $table->boolean('minggu');
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
        Schema::dropIfExists('hari_absens');
    }
}
