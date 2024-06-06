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
        // $kunjungan = DB::table('kunjungan')
        // ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        // ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan')
        // ->where('tujuan_kunjungan', '=', 'Poli Umum')
        // ->where('status_penanganan', '=' ,'Sudah')->get();

        // $penanganan = DB::table('kunjungan')
        // ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        // ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan')
        // ->where('tujuan_kunjungan', '=', 'Poli Umum')
        // ->where('status_penanganan', '=' ,'Belum')->get();
        $belum_ditangani = Kunjungan::where('tujuan_kunjungan', '=', 'Poli Umum')->where('status_penanganan', '=', 'Belum')->get();
        $pasiens = RekamMedis::leftJoin('kunjungan', 'rekam_medis.id_kunjungan', '=', 'kunjungan.id_kunjungan')
        ->leftJoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->leftJoin('icd as diagnosis1', 'rekam_medis.diagnosa', '=', 'diagnosis1.id_icd')
        // ->leftJoin('icd as diagnosis2', 'rekam_medis.diagnosis_2', '=', 'diagnosis2.id_icd')
        ->select(
            'rekam_medis.*',
            'kunjungan.*',
            'pengunjung.*',
            'diagnosis1.nama_penyakit as diagnosis1_nama',
            // 'diagnosis2.nama_penyakit as diagnosis2_nama',
        )
        ->get();
        return view('poli-umum.mengelola_kunjungan.index', ['pasiens' => $pasiens, 'penanganan'=> $belum_ditangani]);
    }

    public function add_rekammedis(){
        $pasien = DB::table('kunjungan')
        ->leftjoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->select('id_kunjungan', 'nama_pengunjung', 'tanggal_kunjungan', 'tanggal_lahir')
        ->where('tujuan_kunjungan', '=' , "Poli Umum")
        ->first();
        return view('poli-umum.mengelola_kunjungan.update', ['pasien' => $pasien]);
    }

    public function store_rekammedis(Request $request, $id_kunjungan){
        $pasien = Kunjungan::find($id_kunjungan);
        $rekammedis = new RekamMedis;

        if($pasien->status_penanganan == "Belum"){
            $rekammedis->id_kunjungan = $request->id_kunjungan;
            $rekammedis->anamnesa = $request->anamnesa;
            $rekammedis->berat_badan = $request->berat_badan;
            $rekammedis->tinggi_badan = $request->tinggi_badan;
            $rekammedis->sistolik = $request->sistolik;
            $rekammedis->diastolik = $request->diastolik;
            $rekammedis->diagnosa = $request->id_diagnosis1;
            $rekammedis->status_rujukan = $request->status_rujukan;
            $rekammedis->save();

            $pasien->status_penanganan = "Sudah";
            $pasien->save();

            return redirect(route('data_poliumum'))->with('success', "Pasien selesai ditangani");
        }
        
    }

    public function update_rekammedis($id_kunjungan){
        $pasiens = RekamMedis::leftJoin('kunjungan', 'rekam_medis.id_kunjungan', '=', 'kunjungan.id_kunjungan')
        ->leftJoin('pengunjung', 'kunjungan.id_pengunjung', '=', 'pengunjung.id_pengunjung')
        ->leftJoin('icd as diagnosis1', 'rekam_medis.diagnosa', '=', 'diagnosis1.id_icd')
        // ->leftJoin('icd as diagnosis2', 'rekam_medis.diagnosis_2', '=', 'diagnosis2.id_icd')
        ->select(
            'rekam_medis.*',
            'kunjungan.*',
            'pengunjung.*',
            'diagnosis1.nama_penyakit as diagnosis1_nama',
            // 'diagnosis2.nama_penyakit as diagnosis2_nama',
        )
        ->first();

        return view('poli-umum.mengelola_kunjungan.edit', ['pasien' => $pasiens]);
    }

    public function edit_rekammedis(Request $request, $id_rekam_medis)
    {
        $rekammedis = RekamMedis::find('$id_rekam_medis');
        $rekammedis->anamnesa = $request->anamnesa;
        $rekammedis->berat_badan = $request->berat_badan;
        $rekammedis->tinggi_badan = $request->tinggi_badan;
        $rekammedis->sistolik = $request->sistolik;            
        $rekammedis->diastolik = $request->diastolik;
        $rekammedis->diagnosa = $request->id_diagnosis1;
        $rekammedis->status_rujukan = $request->status_rujukan;            
        $rekammedis->update();

        return redirect(route('data_poliumum'))->with('success', 'data berhasil diperbarui');
    }

    public function delete_datakunjungan($id_kunjungan){
        $kunjungan = Kunjungan::find($id_kunjungan);
        if($kunjungan->status_penanganan == "Sudah"){
            return redirect()->back()->with('error', 'Pasien sudah ditangani');
        }
        $kunjungan->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
