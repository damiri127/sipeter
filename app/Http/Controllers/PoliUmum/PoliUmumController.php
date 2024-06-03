<?php

namespace App\Http\Controllers\PoliUmum;

use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kunjungan;

class PoliUmumController extends Controller
{
    public function index(){
        return view('poli-umum.layouts.layout');
    }

    public function data_poli(){
        $kunjungan = DB::table('kunjungan')
        ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan')
        ->where('tujuan_kunjungan', '=', 'Poli Umum')
        ->where('status_penanganan', '=' ,'Sudah')->get();

        $penanganan = DB::table('kunjungan')
        ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan')
        ->where('tujuan_kunjungan', '=', 'Poli Umum')
        ->where('status_penanganan', '=' ,'Belum')->get();
        return view('poli-umum.mengelola_kunjungan.index', ['pengunjung' => $kunjungan, 'penanganan'=> $penanganan]);
    }

    public function add_rekammedis(){
        $pasien = DB::table('kunjungan')
        ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan', 'tanggal_lahir')
        ->where('tujuan_kunjungan', '=' , "Poli Umum")
        ->first();
        return view('poli-umum.mengelola_kunjungan.update', ['pasien' => $pasien]);
    }

    public function update_rekammedis(Request $request, $id_kunjungan){
        $rekammedis = new RekamMedis;
        $rekammedis->id_kunjungan = $request->id_kunjungan;
        $rekammedis->anamnesa = $request->anamnesa;
        $rekammedis->berat_badan = $request->berat_badan;
        $rekammedis->tinggi_badan = $request->tinggi_badan;
        $rekammedis->sistolik = $request->sistolik;
        $rekammedis->diastolik = $request->diastolik;
        $rekammedis->diagnosa = $request->diagnosa;
        $rekammedis->status_rujukan = $request->status_rujukan;
        $rekammedis->save();

        $updateStatus = Kunjungan::find($id_kunjungan);
        $updateStatus->status_kunjungan = "Sudah";
        $updateStatus->update();
    }
}
