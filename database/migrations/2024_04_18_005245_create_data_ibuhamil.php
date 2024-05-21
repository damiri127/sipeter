<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_ibuhamil', function (Blueprint $table) {
            $table->id('id_dataibuhamil')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('kategori', ['K1', 'K4']);
            $table->integer('paritas');
            $table->integer('jarak_kehamilan');
            $table->integer('ukuran_lila');
            $table->integer('tinggi_badan');
            $table->date('tanggal_periksa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ibuhamil');
    }
};
