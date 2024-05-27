<?php

namespace App\Http\Controllers\PetugasLoket;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class ArsipPengunjungController extends Controller
{
    public function index() {
        $dataPengunjung = Pengunjung::get();
        return view('petugas_loket.arsipdatapengunjung.index', ['pengunjung'=>$dataPengunjung]);
    }

    public function edit_datapengunjung($id_pengunjung){
        $dataPengunjung = Pengunjung::find($id_pengunjung);
        return view('petugas_loket.arsipdatapengunjung.edit_pengunjung', ['pengunjung'=>$dataPengunjung]);
    }

    public function add_datapengunjung(Request $request){
        return view('petugas_loket.arsipdatapengunjung.tambah_pengunjung');
    }

    public function insert_datapengunjung(Request $request){
        $checkDoublePengunjung = Pengunjung::where('NIK', $request->NIK)->first();

        if($checkDoublePengunjung != null)
        {
            return redirect(route('index_arsippengunjung'))->with("error","NIK yang anda masukan sudah terdaftar sebagai pengunjung lama");
        } 
        
        $pengunjung = new Pengunjung;
        $pengunjung->nama_pengunjung = $request->nama_pengunjung;
        $pengunjung->NIK = $request->NIK;
        $pengunjung->tanggal_lahir = $request->tanggal_lahir;
        $pengunjung->tempat_lahir = $request->tempat_lahir;
        $pengunjung->asal_kecamatan = $request->asal_kecamatan;
        $pengunjung->asal_desa = $request->asal_desa;
        $pengunjung->alamat_lengkap = $request->alamat_lengkap;
        $pengunjung->nomor_telepon = $request->nomor_telepon;
        $pengunjung->jenis_kelamin = $request->jenis_kelamin;
        $pengunjung->status_menikah = $request->status_menikah;
        $pengunjung->asuransi = $request->asuransi;
        $pengunjung->nama_wali = $request->nama_wali;
        $pengunjung->nomor_teleponwali = $request->nomor_teleponwali;
        $pengunjung->asal_kecamatanwali = $request->asal_kecamatanwali;
        $pengunjung->asal_desawali = $request->asal_desawali;
        $pengunjung->alamat_lengkapwali = $request->alamat_lengkapwali;
        $pengunjung->save();

        return redirect(route('index_arsippengunjung'))->with('success', 'Data Pengunjung Berhasil Diinputkan');
    

    }

    public function update_datapengunjung(Request $request, $id_pengunjung){
        $pengunjung = Pengunjung::find($id_pengunjung);
        
        $pengunjung->asal_kecamatan = $request->asal_kecamatan;
        $pengunjung->asal_desa = $request->asal_desa;
        $pengunjung->alamat_lengkap = $request->alamat_lengkap;
        $pengunjung->nomor_telepon = $request->nomor_telepon;
        $pengunjung->status_menikah = $request->status_menikah;
        $pengunjung->asuransi = $request->asuransi;
        $pengunjung->nama_wali = $request->nama_wali;
        $pengunjung->nomor_teleponwali = $request->nomor_teleponwali;
        $pengunjung->asal_kecamatanwali = $request->asal_kecamatanwali;
        $pengunjung->asal_desawali = $request->asal_desawali;
        $pengunjung->alamat_lengkapwali = $request->alamat_lengkapwali;
        $pengunjung->update();

        return redirect(route('index_arsippengunjung'))->with('success', 'Data Berhasil Diubah');
            
    }

    public function delete_datapengunjung($id_pengunjung){
        $pengunjung = Pengunjung::find($id_pengunjung);
        $dataKunjungan = Kunjungan::where('id_pengunjung', $id_pengunjung)->first();
        if($dataKunjungan != null){
            return redirect(route('index_arsippengunjung'))->with('error', 'Data Tercatat Pada Table Lain');
        }
        $pengunjung->delete();
        return redirect(route('index_arsippengunjung'))->with('success', 'Data Berhasil Dihapus');
    }
}
