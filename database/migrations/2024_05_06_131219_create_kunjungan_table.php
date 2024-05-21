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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->foreignId('id_pengunjung')->references('id_pengunjung')->on('pengunjung');
            $table->enum('tujuan_kunjungan', [
                'Poli Umum',
                'Poli KIA, KB, dan Imunisasi', 
                'Poli Gizi',
                'Poli TB dan Kusta',
                'Poli ISPA',
                'UGD',
                'Laboratorium',
            ]);
            $table->enum('status_penanganan', ["Sudah", "Belum"]);
            $table->dateTime('tanggal_kunjungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
