<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('program_ukm', function (Blueprint $table) {
            $table->id('id_program_ukm');
            $table->unsignedBigInteger('id_sub_kategori_ukm');
            $table->string('nama_program_ukm');
            $table->unsignedBigInteger('penanggung_jawab_program_ukm');
            $table->timestamps();

            $table->foreign('id_sub_kategori_ukm')->references('id_sub_kategori_ukm')->on('sub_kategori_ukm')->onDelete('cascade');
            $table->foreign('penanggung_jawab_program_ukm')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_ukm');
    }
};
