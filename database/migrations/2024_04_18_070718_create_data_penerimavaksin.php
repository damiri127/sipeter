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
        Schema::create('data_penerimavaksin', function (Blueprint $table) {
            $table->id('id_penerimavaksin')->autoIncrement();
            $table->unsignedBigInteger('vaksin_id');
            $table->foreign('vaksin_id')->references('id_data_vaksinasi')->on('data_vaksinasi');
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id_pasien')->on('pasien');
            $table->enum('status_penerima', [
                'bayi 9-11 bln',
                'bayi 2-11 bln',
                'bayi 0-11 bln',
                'ibu hamil',
                'wanita usia subur',
                'murid sd kelas1',
                'murid sd kelas2',
                'murid sd kelas6'
            ]);
            $table->date('tanggal_vaksinasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penerimavaksin');
    }
};
