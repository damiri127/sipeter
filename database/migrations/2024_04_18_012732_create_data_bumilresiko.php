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
        Schema::create('data_bumilresiko', function (Blueprint $table) {
            $table->id('data_bumilresiko')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('pendarahan', ['Ya', 'Tidak']);
            $table->enum('infeksi', ['Ya', 'Tidak']);
            $table->enum('keracunan_kehamilan', ['Ya', 'Tidak']);
            $table->enum('partus_lama', ['Ya', 'Tidak']);
            $table->enum('status', ['Ditangani', 'Dirujuk']);
            $table->integer('nomor_rujukan');
            $table->date('tinggal_periksa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_bumilresiko');
    }
};
