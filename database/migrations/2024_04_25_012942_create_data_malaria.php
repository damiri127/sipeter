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
        Schema::create('data_malaria', function (Blueprint $table) {
            $table->id('id_datamalaria')->autoIncrement();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id_pasien')->on('pasien');
            $table->enum('status', ['berat', 'komplikasi']);
            $table->enum('status_pasien', ['Ibu hamil', 'Anak-anak', 'Pasien lainnya']);
            $table->enum('status_pengobatan_profilaksi', ['Ya', 'Tidak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_malaria');
    }
};
