<?php

namespace App\Http\Controllers\PoliGizi;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use App\Models\RekamMedisPasienPoliGizi;

class PoliGiziController extends Controller
{
    public function index(){
        return view('poli_gizi.index');
    }

    public function data_kunjungan(){
        $kunjungan_belumditangani = Kunjungan::where('tujuan_kunjungan', 'Poli Gizi')->where('status_penanganan', 'belum')->get();
        $pasiens = RekamMedisPasienPoliGizi::leftJoin('kunjungan', 'rekam_medis_poligizi.id_kunjungan', '=', 'kunjungan.id_kunjungan')
        ->leftJoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->leftJoin('icd as diagnosis1', 'rekam_medis_poligizi.diagnosis_1', '=', 'diagnosis1.id_icd')
        ->leftJoin('icd as diagnosis2', 'rekam_medis_poligizi.diagnosis_2', '=', 'diagnosis2.id_icd')
        ->select(
            'rekam_medis_poligizi.*',
            'kunjungan.*',
            'pengunjung.*',
            'diagnosis1.nama_penyakit as diagnosis1_nama',
            'diagnosis2.nama_penyakit as diagnosis2_nama',
        )
        ->get();
        

        return view('poli_gizi.data_kunjungan.index', ['pasiens'=>$pasiens,'kunjungan_belumditangani'=>$kunjungan_belumditangani]);
    }

    public function add_rekammedis($id_kunjungan){
        $data_pasien = Kunjungan::find($id_kunjungan);
        return view('poli_gizi.data_kunjungan.add_rekammedispasien', ['pasien'=>$data_pasien, 'id_kunjungan'=>$id_kunjungan]);
    }

    public function store_rekammedis(Request $request, $id_kunjungan){
        $pasien = Kunjungan::find($id_kunjungan);
        $rekamMedisPasien = new RekamMedisPasienPoliGizi;

        if($pasien->status_penanganan == "Belum"){

            $rekamMedisPasien->id_kunjungan = $request->id_kunjungan;
            $rekamMedisPasien->anamnesa = $request->anamnesa;
            $rekamMedisPasien->tinggi_badan = $request->tinggi_badan;
            $rekamMedisPasien->berat_badan = $request->berat_badan;
            $rekamMedisPasien->diastolik = $request->diastolik;
            $rekamMedisPasien->sistolik = $request->sistolik;
            $rekamMedisPasien->diagnosis_1 = $request->id_diagnosis1; 
            $rekamMedisPasien->diagnosis_2 = $request->id_diagnosis2;
            $rekamMedisPasien->status_rujukan = $request->status_rujukan;
            $rekamMedisPasien->ukuran_lila = $request->ukuran_lila;
            $rekamMedisPasien->kategori_pasien = $request->kategori_pasien;
            $rekamMedisPasien->perolehan_tablet_tambah_darah_30fe1 = $request->perolehan_tablet_tambah_darah_30fe1;
            $rekamMedisPasien->perolehan_tablet_tambah_darah_90fe3 = $request->perolehan_tablet_tambah_darah_90fe3;
            $rekamMedisPasien->perolehan_sirup_tambah_darah_febal1 = $request->perolehan_sirup_tambah_darah_febal1;
            $rekamMedisPasien->perolehan_sirup_tambah_darah_febal2 = $request->perolehan_sirup_tambah_darah_febal2;
            $rekamMedisPasien->perolehan_kapsul_yudium = $request->perolehan_kapsul_yudium;
            $rekamMedisPasien->perolehan_vitaminA_dosistinggi = $request->perolehan_vitaminA_dosistinggi;
            
            $rekamMedisPasien->save();
            $pasien->status_penanganan = "Sudah";
            $pasien->save();
            
            return redirect(route('data_kunjunganpoligizi'))->with('success', 'Pasien selesai ditangain!');

        }

        return redirect(route('data_kunjunganpoligizi'))->with('error', 'Pasien sudah ditangani');

    }

    public function edit_rekammedis($id_rekam_medis_poligizi){
        $pasien = RekamMedisPasienPoliGizi::where('id_rekam_medis_poligizi',$id_rekam_medis_poligizi)->leftJoin('kunjungan', 'rekam_medis_poligizi.id_kunjungan', '=', 'kunjungan.id_kunjungan')
        ->leftJoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->leftJoin('icd as diagnosis1', 'rekam_medis_poligizi.diagnosis_1', '=', 'diagnosis1.id_icd')
        ->leftJoin('icd as diagnosis2', 'rekam_medis_poligizi.diagnosis_2', '=', 'diagnosis2.id_icd')
        ->select(
            'rekam_medis_poligizi.*',
            'kunjungan.*',
            'pengunjung.*',
            'diagnosis1.nama_penyakit as diagnosis1_nama',
            'diagnosis2.nama_penyakit as diagnosis2_nama',
        )
        ->first();

        return view('poli_gizi.data_kunjungan.update_rekammedis', ['pasien'=>$pasien]);

    }

    public function update_rekammedis(Request $request, $id_rekam_medis_poligizi){

        $rekamMedisPasien = RekamMedisPasienPoliGizi::find($id_rekam_medis_poligizi);
        
        $rekamMedisPasien->anamnesa = $request->anamnesa;
        $rekamMedisPasien->tinggi_badan = $request->tinggi_badan;
        $rekamMedisPasien->berat_badan = $request->berat_badan;
        $rekamMedisPasien->diastolik = $request->diastolik;
        $rekamMedisPasien->sistolik = $request->sistolik;
        $rekamMedisPasien->diagnosis_1 = $request->id_diagnosis1; 
        $rekamMedisPasien->diagnosis_2 = $request->id_diagnosis2;
        $rekamMedisPasien->status_rujukan = $request->status_rujukan;
        $rekamMedisPasien->update();   

        return redirect(route('data_kunjunganpoligizi'))->with('success', 'Data berhasil diperbarui');

    }

    public function delete_kunjunganpasien($id_kunjungan){
        $dataKunjungan = Kunjungan::find($id_kunjungan);
        if($dataKunjungan->status_penanganan == "Sudah"){
            return redirect(route('data_kunjunganpoligizi'))->with('error', 'Pengunjung Sudah Ditangani');
        }
        $dataKunjungan->delete();
        return redirect(route('data_kunjunganpoligizi'))->with('success','Data Kunjungan Dihapus');
    }

    
}
