<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';

    public function data_pengunjung()
    {
        return $this->hasOne(Pengunjung::class, 'id_pengunjung', 'id_pengunjung');
    }
}
