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
        Schema::create('data_kesakitan', function (Blueprint $table) {
            $table->id('id_datakesakitan')->autoIncrement();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id_pasien')->on('pasien');
            //$table->foreignId('id_pasien');
            $table->unsignedBigInteger('jeniskesakitan_id');
            $table->foreign('jeniskesakitan_id')->references('id_jeniskesakitan')->on('jenis_kesakitan');
            //$table->foreignId('id_jeniskesakitan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kesakitan');
    }
};
