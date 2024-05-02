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
        Schema::create('data_fogingfokus', function (Blueprint $table) {
            $table->id('id_datafogingfokus')->autoIncrement();
            $table->string('alamat', 100);
            $table->date('tanggal_foging');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_fogingfokus');
    }
};
