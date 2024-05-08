<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    protected $primaryKey = 'id_pengunjung';
    

    // protected $fillable = [
    //     'id_pengunjung',
    //     'nama_pengunjung',
    //     'NIK',
    //     'tanggal_lahir',
    //     'tempat_lahir',
    //     'asal_kecamatan',
    //     'asal_desa',
    //     'alamat_lengkap',
    //     'nomor_telepon', 
    //     'jenis_kelamin',
    //     'status_menikah',
    //     'asuransi', 
    //     'nama_wali',
    //     'nomor_teleponwali',
    //     'asal_kecamatanwali',
    //     'asal_desawali',
    //     'alamat_lengkapwali',
    //     'tanggal_kunjungan',
    // ];
}
