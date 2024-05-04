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
        Schema::create('data_kunjunganneonatus', function (Blueprint $table) {
            $table->id('id_data_kunjunganneonatus')->autoIncrement();
            $table->unsignedBigInteger('datakelahiran_id');
            $table->foreign('datakelahiran_id')->references('id_data_kelahiran')->on('data_kelahiran');
            $table->enum('kategori_kunjungan', ['0', '1', '2', '3']);
            $table->enum('afiksia', ['Ya', 'Tidak']);
            $table->enum('traoma_lahir', ['Ya', 'Tidak']);
            $table->enum('neonatus', ['Ya', 'Tidak']);
            $table->enum('neonatrium', ['Ya', 'Tidak']);
            $table->enum('status_rujukan', ['Dirujuk', 'Tidak dirujuk']);
            $table->integer('nomor_rujukan');
            $table->integer('usia_bayi');
            $table->enum('status_bayi', ['Hidup', 'Mati']);
            $table->date('tanggal_kunjungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kunjunganneonatus');
    }
};
