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
            $table->integer('ukuran_lila');
            $table->integer('diastolik');
            $table->integer('sistolik');
            $table->enum('kategori_pasien', ['Ibu Hamil', 'Ibu Nifas', 'Balita', 'Umum']);
            $table->enum('perolehan_tablet_tambah_darah_30fe1', ['Dapat', 'Tidak dapat']);
            $table->enum('perolehan_tablet_tambah_darah_90fe3', ['Dapat', 'Tidak dapat']);
            $table->enum('perolehan_sirup_tambah_darah_febal1', ['Dapat', 'Tidak dapat']);
            $table->enum('perolehan_sirup_tambah_darah_febal2', ['Dapat', 'Tidak dapat']);
            $table->enum('perolehan_kapsul_yudium', ['Dapat', 'Tidak dapat']);
            $table->enum('perolehan_vitaminA_dosistinggi', ['Dapat', 'Tidak dapat']);
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
