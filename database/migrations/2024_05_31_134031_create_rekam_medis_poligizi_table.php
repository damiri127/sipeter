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
        Schema::create('rekam_medis_poligizi', function (Blueprint $table) {
            $table->id('id_rekam_medis_poligizi')->autoIncrement();
            $table->unsignedBigInteger('id_kunjungan');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan')->onDelete('restrict');
            $table->foreignId('diagnosis_1')->references('id_icd')->on('icd');
            $table->foreignId('diagnosis_2')->references('id_icd')->on('icd');
            $table->string('anamnesa');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('diastolik');
            $table->string('sistolik');
            $table->enum("status_rujukan",["rujukan internal", "rujukan eksternal", "tidak perlu"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis_poligizi');
    }
};
