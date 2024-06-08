<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaUkmTable extends Migration
{
    public function up()
    {
        Schema::create('anggota_ukm', function (Blueprint $table) {
            $table->id('id_anggota_ukm');
            $table->unsignedBigInteger('id_program_ukm');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_program_ukm')->references('id_program_ukm')->on('program_ukm')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota_ukm');
    }
}
