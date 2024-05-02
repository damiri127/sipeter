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
        Schema::create('data_penyemprotanmalaria', function (Blueprint $table) {
            $table->id('id_data_penyemprotanmalaria')->autoIncrement();
            $table->string('alamat', 100);
            $table->string('nama_pemilik_rumah', 50);
            $table->date('tanggal_penyemprotan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penyemprotanmalaria');
    }
};
