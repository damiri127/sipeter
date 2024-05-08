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
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id('id_pengunjung');
            $table->string('nama_pengunjung');
            $table->string('NIK');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('asal_kecamatan');
            $table->string('asal_desa');
            $table->string('alamat_lengkap');
            $table->string('nomor_telepon');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status_menikah', ['Sudah Menikah', 'Belum Menikah']);
            $table->enum('asuransi', ['BPJS', 'Asuransi Lainnya', 'Reguler']);
            $table->string('nama_wali');
            $table->string('nomor_teleponwali');
            $table->string('asal_kecamatanwali');
            $table->string('asal_desawali');
            $table->string('alamat_lengkapwali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengunjung');
    }
};
