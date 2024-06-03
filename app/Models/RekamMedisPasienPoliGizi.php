<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kunjungan;

class RekamMedisPasienPoliGizi extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis_poligizi';

    protected $primaryKey = 'id_rekam_medis_poligizi';

    public function data_kunjungan()
    {
        return $this->hasOne(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }

    public function kunjungan(){
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan');
    }

}
