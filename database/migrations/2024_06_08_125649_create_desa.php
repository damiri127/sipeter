<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesa extends Migration
{
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id('id_desa');
            $table->string('nama_desa');
            $table->float('lon');
            $table->float('lat');
            $table->float('luas_wilayah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desa');
    }
}
