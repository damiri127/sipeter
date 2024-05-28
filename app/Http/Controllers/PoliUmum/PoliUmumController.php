<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliUmumController extends Controller
{
    public function index(){
        return view('poli-umum.layouts.layout');
    }

    public function data_poli(){
        $kunjungan = DB::table('kunjungan')
        ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan')
        ->where('status_penanganan', '=' ,'Sudah')->get();
        return view('poli-umum.mengelola_kunjungan.index', ['pengunjung' => $kunjungan]);
    }
}
