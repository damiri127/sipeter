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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama', 50);
            $table->integer('nik')->lenght(16);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('tempat_lahir', 50);
            $table->enum('jenis_kelamin', ['Perempuan', 'Laki-laki']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
