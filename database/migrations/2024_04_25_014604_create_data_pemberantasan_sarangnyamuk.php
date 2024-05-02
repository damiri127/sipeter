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
        Schema::create('data_pemberantasan_sarangnyamuk', function (Blueprint $table) {
            $table->id('id_data_pemberantasan_sarangnyamuk')->autoIncrement();
            $table->string('alamat');
            $table->date('tanggal_pemberantasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemberantasan_sarangnyamuk');
    }
};
