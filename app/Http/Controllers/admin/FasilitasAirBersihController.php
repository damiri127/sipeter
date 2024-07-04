<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FasilitasAir;
use App\Models\StrukturJabatan;
use App\Models\UKM;
use Illuminate\Http\Request;

class FasilitasAirBersihController extends Controller
{
    public function index(){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();   

        $fasilitas_air = FasilitasAir::all();

        return view('admin.kesehatan-lingkungan.program.air-bersih.index', ['jenis_ukm'=>$jenis_ukm,'jabatan'=>$jabatan, 'fasilitas_air'=>$fasilitas_air]);

    }

    public function add(){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();   
        return view('admin.kesehatan-lingkungan.program.air-bersih.fasilitas.add', ['jenis_ukm'=>$jenis_ukm,'jabatan'=>$jabatan]);

    }

    public function store(Request $request){
        // Jika ada 1 pemeriksaan fisiki yang "Ya" maka hasil_pemeriksaan = Amat Tinggi 
        $namaFasilitas = $request->nama_fasilitas;
        $airBerbau = $request->bau_pemeriksaan;
        $airBerasa = $request->rasa_pemeriksaan;
        $airBerwarna = $request->warna_pemeriksaan;

        // dd($airBerbau);

        $jamban_pemeriksaan = $request->jam_pemeriksaan;
        $tinggi_jamban_pemeriksaan = $request->tinggi_jamban_pemeriksaan;
        $pembuangan_air_pemeriksaan = $request->pembuangan_air_pemeriksaan;

        $scoreFisik = (int)$airBerasa + (int)$airBerbau + (int)$airBerwarna;
        $scorePemeriksaanLanjutan = (int)$jamban_pemeriksaan+(int)$tinggi_jamban_pemeriksaan+(int)$pembuangan_air_pemeriksaan;


        $totalScore = $scoreFisik+$scorePemeriksaanLanjutan;

        $fasilitasAir = new FasilitasAir();

        $fasilitasAir->nama_fasilitas = $namaFasilitas;
        $fasilitasAir->nilai_pemeriksaan_fisik = $scoreFisik;
        $fasilitasAir->nilai_pemeriksaan_lanjutan = $scorePemeriksaanLanjutan;

        if($scoreFisik >= 0 ){
            $fasilitasAir->hasil_pemeriksaan = 'Resiko Amat Tinggi';
        }

        $checkKontaminasi = $totalScore / 6 ;

        if($checkKontaminasi < 0.25){
            $fasilitasAir->hasil_pemeriksaan = ' Resiko Rendah';
        }

        if($checkKontaminasi < 0.5){
            $fasilitasAir->hasil_pemeriksaan = 'Resiko Sedang';
        }

        if($checkKontaminasi <= 0.75){
            $fasilitasAir->hasil_pemeriksaan = 'Resiko Tinggi';
        }

        if($checkKontaminasi > 0.75){
            $fasilitasAir->hasil_pemeriksaan = 'Resiko Amat Tinggi';
        }


        // dd($fasilitasAir);
        $fasilitasAir->save();

        return redirect(route('fasilitas_air_bersih'))->with('success', 'data berhasil ditambahkan');
        
        
        
    }
}
