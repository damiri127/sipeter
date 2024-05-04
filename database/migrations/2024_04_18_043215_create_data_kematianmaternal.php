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
        Schema::create('data_kematianmaternal', function (Blueprint $table) {
            $table->id('id_kematianmaternal')->autoIncrement();
            $table->unsignedBigInteger('datakelahiran_id');
            $table->foreign('datakelahiran_id')->references('id_data_kelahiran')->on('data_kelahiran');
            $table->enum('kategori', ['Melahirkan', 'Nifas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kematianmaternal');
    }
};
