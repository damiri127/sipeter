<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkm extends Migration
{
    public function up()
    {
        Schema::create('ukm', function (Blueprint $table) {
            $table->id('id_ukm');
            $table->string('nama_jenis_ukm');
            $table->unsignedBigInteger('penanggung_jawab_ukm')->unique();
            $table->timestamps();

            $table->foreign('penanggung_jawab_ukm')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ukm');
    }
}
