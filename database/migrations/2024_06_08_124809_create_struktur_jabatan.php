<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrukturJabatan extends Migration
{
    public function up()
    {
        Schema::create('struktur_jabatan', function (Blueprint $table) {
            $table->id('id_struktur_jabatan');
            $table->string('nama_struktur_jabatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('struktur_jabatan');
    }
}
