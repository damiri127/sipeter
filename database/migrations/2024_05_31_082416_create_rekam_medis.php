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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id('id_rekam_medis')->autoIncrement();
            $table->unsignedBigInteger('id_kunjungan');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan')->onDelete('restrict');
            $table->string('anamnesa');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('sistolik');
            $table->string('diastolik');
            $table->foreignId('diagnosa')->references('id_icd')->on('icd');
            $table->enum('status_rujukan', ['rujukan internal', 'rujukan eksternal', 'tidak perlu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
