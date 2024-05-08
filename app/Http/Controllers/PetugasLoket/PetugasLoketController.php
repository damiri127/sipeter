<?php

namespace App\Http\Controllers\PetugasLoket;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PetugasLoketController extends Controller
{
    //
    public function index()
    {
        return view('petugas_loket.index');
    }

    public function data_kunjungan()
    {
        $pengunjung = Kunjungan::latest()->paginate(5);
        return view('petugas_loket.mengelola_datakunjungan.data_kunjungan', ['pengunjung' => $pengunjung]);
    }

    public function add_datakunjungan()
    {
        return view('petugas_loket.mengelola_datakunjungan.tambah_pengunjungbaru');
    }

    public function insert_datapengunjung(Request $request)
    {
        $checkDoublePengunjung = Pengunjung::where('NIK', $request->NIK)->first();

        if($checkDoublePengunjung != null)
        {
            return redirect(route('data_kunjungan'))->with("Data Pengunjung Sudah Ada");
        } 
        else
        {
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
    
            $findPengunjung = Pengunjung::where('NIK', $request->NIK)->first();
            $kunjungan = new Kunjungan;
            $kunjungan->id_pengunjung = $findPengunjung->id_pengunjung;
            $kunjungan->tujuan_kunjungan = $request->tujuan_kunjungan;
            $kunjungan->save();
    
            return redirect(route('data_kunjungan'))->with("SUKSES!");
        }

    }




}
