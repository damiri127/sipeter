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
        Schema::create('sub_kategori_ukm', function (Blueprint $table) {
            $table->id('id_sub_kategori_ukm');
            $table->unsignedBigInteger('id_ukm');
            $table->string('nama_sub_kategori_ukm');
            $table->unsignedBigInteger('penanggung_jawab_sub_kategori_ukm')->unique();
            $table->timestamps();

            $table->foreign('id_ukm')->references('id_ukm')->on('ukm')->onDelete('cascade');
            $table->foreign('penanggung_jawab_sub_kategori_ukm')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_kategori_ukm');
    }
};
