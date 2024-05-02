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
        Schema::create('data_kelahiran', function (Blueprint $table) {
            $table->id('id_data_kelahiran')->autoIncrement();
            $table->unsignedBigInteger('dataibuhamil_id');
            $table->foreign('dataibuhamil_id')->references('id_dataibuhamil')->on('data_ibuhamil');
            $table->enum('ditangani_nakes', ['Ya', 'Tidak']);
            $table->enum('status_kehidupanbayi', ['Hidup', 'Mati']);
            $table->integer('berat_badanbayi');
            $table->date('tanggal_kelahiran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kelahiran');
    }
};
