<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturJabatan extends Model
{
    use HasFactory;
    protected $table = 'struktur_jabatan';
    protected $primarykey = 'id_struktur_jabatan';

    protected $fillable = ['nama_jabatan'];
}
