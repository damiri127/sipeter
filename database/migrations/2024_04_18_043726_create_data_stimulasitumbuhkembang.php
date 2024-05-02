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
        Schema::create('data_stimulasitumbuhkembang', function (Blueprint $table) {
            $table->id('data_stimulasitumbuhkembang')->autoIncrement();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id_pasien')->on('pasien');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->integer('besar_lingkarkepala');
            $table->string('status_gizi');
            $table->string('status_perawakan');
            $table->string('status_beratbadan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_stimulasitumbuhkembang');
    }
};
