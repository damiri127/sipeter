<?php

namespace App\Http\Controllers\PoliGizi;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class PoliGiziController extends Controller
{
    public function index(){
        return view('poli_gizi.index');
    }

    public function data_kunjungan(){
        $kunjungan_belumditangani = Kunjungan::where('tujuan_kunjungan', 'Poli Gizi')->where('status_penanganan', 'belum')->get();
        $kunjungan_sudahditangani = Kunjungan::where('tujuan_kunjungan', 'Poli Gizi')->where('status_penanganan', 'sudah')->get();

        return view('poli_gizi.data_kunjungan.index', ['kunjungan_sudahditangani'=>$kunjungan_sudahditangani, 'kunjungan_belumditangani'=>$kunjungan_belumditangani]);
    }

    public function add_rekammedis($id_kunjungan){
        $data_pasien = Kunjungan::find($id_kunjungan);
        return view('poli_gizi.data_kunjungan.add_rekammedispasien', ['pasien'=>$data_pasien]);
    }

    
}
