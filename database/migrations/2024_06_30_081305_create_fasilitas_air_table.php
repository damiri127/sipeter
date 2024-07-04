<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasAirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_air', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->integer('nilai_pemeriksaan_fisik');
            $table->integer('nilai_pemeriksaan_lanjutan');
            $table->enum('hasil_pemeriksaan', ['Expired', 'Resiko Amat Tinggi', 'Resiko Tinggi', 'Resiko Sedang', 'Resiko Rendah']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_air');
    }
}

