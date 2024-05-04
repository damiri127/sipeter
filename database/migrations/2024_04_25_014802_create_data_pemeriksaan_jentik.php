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
        Schema::create('data_pemeriksaan_jentik', function (Blueprint $table) {
            $table->id('id_data_pemeriksaan_jentik');
            $table->string('alamat');
            $table->string('nama_pemilik_rumah');
            $table->enum('deteksi_jentiknyamuk', ['terdeteksi', 'tidak terdeteksi']);
            $table->date('tanggal_pemeriksaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemeriksaan_jentik');
    }
};
