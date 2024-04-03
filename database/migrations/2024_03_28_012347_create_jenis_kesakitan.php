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
        Schema::create('jenis_kesakitan', function (Blueprint $table) {
            $table->id('id_jeniskesakitan')->autoIncrement();
            $table->foreignId('id_namakesakitan');
            $table->string('nama_jeniskesakitan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kesakitan');
    }
};
