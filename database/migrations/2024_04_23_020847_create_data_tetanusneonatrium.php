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
        Schema::create('data_tetanusneonatrium', function (Blueprint $table) {
            $table->id('id_datatetanusneonatrium')->autoIncrement();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id_pasien')->on('pasien');
            $table->date('tanggal_pemeriksaan');
            $table->enum('status', ['dilacak', 'ditemukan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tetanusneonatrium');
    }
};
