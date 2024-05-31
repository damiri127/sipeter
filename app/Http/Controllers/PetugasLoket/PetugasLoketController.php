<?php

namespace App\Http\Controllers\PetugasLoket;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class PetugasLoketController extends Controller
{
    //
    public function index()
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $kunjungan_poliumum = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'PolI Umum')->count();
        $kunjungan_politbdankusta = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'Poli TB dan Kusta')->count();
        $kunjungan_poligizi = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'Poli Gizi')->count();
        $kunjungan_polikiadankb = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'Poli KIA, KB, dan Imunisasi')->count();
        $kunjungan_ugd = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'UGD')->count();
        $kunjungan_poliispa = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'Poli ISPA')->count();
        $kunjungan_laboratorium = Kunjungan::where('tanggal_kunjungan', '>=', $thirtyDaysAgo)->where('tujuan_kunjungan', '=', 'Laboratorium')->count();

        $data = [$kunjungan_poliumum, $kunjungan_politbdankusta, $kunjungan_polikiadankb, $kunjungan_poligizi, $kunjungan_ugd, $kunjungan_poliispa, $kunjungan_laboratorium];

        return view('petugas_loket.index', ['data'=>$data]);
    }

    public function data_kunjungan()
    {
        $pengunjung = Kunjungan::orderByDesc('tanggal_kunjungan')->get();
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

            return redirect(route('data_kunjungan'))->with("error","NIK yang anda masukan sudah terdaftar sebagai pengunjung lama");
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
            $kunjungan->asuransi = $request->asuransi;
            $kunjungan->status_penanganan = "Belum";
            $kunjungan->save();

    
            return redirect(route('data_kunjungan'))->with('success', 'Data Berhasil Ditambahkan');
        }

    }

    public function edit_datakunjungan(Request $request, $id_kunjungan){
        $dataKunjungan = Kunjungan::find($id_kunjungan);
        if($dataKunjungan->status_penanganan == "Sudah"){
            return redirect(route('data_kunjungan'))->with('error', 'Pengunjung Sudah Ditangani');
        }

        return view('petugas_loket.mengelola_datakunjungan.update_datakunjungan', ['data_kunjungan' => $dataKunjungan]);
    }

    public function update_datakunjungan(Request $request, $id_kunjungan){

        $dataKunjungan = Kunjungan::find($id_kunjungan);
        $dataKunjungan->tujuan_kunjungan = $request->tujuan_kunjungan;
        $dataKunjungan->update();

        return redirect(route('data_kunjungan'))->with('success', "Data Kunjungan berhasil diperbarui");
        
    }

    public function delete_datakunjungan(Request $request, $id_datakunjungan){
        $dataKunjungan = Kunjungan::find($id_datakunjungan);
        if($dataKunjungan->status_penanganan == "Sudah"){
            return redirect(route('data_kunjungan'))->with('error', 'Pengunjung Sudah Ditangani');
        }
        $dataKunjungan->delete();
        return redirect(route('data_kunjungan'))->with('success','Data Kunjungan Dihapus');
    }

    public function validation_pengunjunglama(Request $request){
        $nik = $request->NIK;
        $dataPengunjungLama = Pengunjung::where('NIK',$nik)->first();
        if($dataPengunjungLama == null){
            
            return redirect(route('add_datakunjungan', ["NIK"=>$nik]))->with('error', 'Data Pengunjung Lama Tidak Ditemukan');
            //return view('petugas_loket.mengelola_datakunjungan.tambah_pengunjungbaru', ['NIK'=>$request->NIK])->with('error','Data Pengunjung Lama Tidak Ditemukan');
            //return redirect(route('data_kunjungan'))->with('error', 'Data Pengunjung Lama Tidak Ditemukan');
        }
        //dd($dataPengunjungLama);
        return view('petugas_loket.mengelola_datakunjungan.tambah_pengunjunglama', ['data_pengunjung'=>$dataPengunjungLama]);
    }

    public function insert_kunjunganPengunjungLama(Request $request, $id_pengunjung){

        $dataKunjungan = new Kunjungan();
        $dataKunjungan->id_pengunjung = $id_pengunjung;
        $dataKunjungan->tujuan_kunjungan = $request->tujuan_kunjungan;
        $dataKunjungan->status_penanganan = "Belum";
        $dataKunjungan->asuransi = $request->asuransi;
        $dataKunjungan->save();

        return redirect(route('data_kunjungan'))->with('success', 'Data Kunjungan Berhasil Dimasukan');

    }

}
