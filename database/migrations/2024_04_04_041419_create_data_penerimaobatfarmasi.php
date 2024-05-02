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
        Schema::create('data_penerimaobatfarmasi', function (Blueprint $table) {
            $table->id('id_penerimaobatfarmasi')->autoIncrement();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id_users')->on('users');
            $table->unsignedBigInteger('id_obatfarmasi');
            $table->foreign('id_obatfarmasi')->references('id_obatfarmasi')->on('dataobat_farmasi');
            $table->date('tanggal_pemberian');
            $table->enum('status_penerima', ['ana-anak', 'ibu_hamil', 'penduduk_lainnya', 'ibu_nifas', 'balita']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penerimaobatfarmasi');
    }
};
