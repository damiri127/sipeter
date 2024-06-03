<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengunjung;
use App\Models\RekamMedisPasienPoliGizi;

class Kunjungan extends Model
{
    use HasFactory;
    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';

    public function data_pengunjung()
    {
        return $this->hasOne(Pengunjung::class, 'id_pengunjung', 'id_pengunjung');
    }

    public function pasien(){
        return $this->belongsTo(Pengunjung::class, 'id_pengunjung');
    }

    public function rekam_medis_poligizi() {
        return $this->hasMany(RekamMedisPasienPoliGizi::class, 'id_kunjungan');
    }
}
