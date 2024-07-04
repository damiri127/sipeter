<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\StrukturJabatan;
use App\Models\SubKategoriUKM;
use App\Models\UKM;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index(){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $desa = Desa::all();
        return view('admin.desa.index', ['jenis_ukm'=>$jenis_ukm,'jabatan'=>$jabatan, 'desa'=>$desa]);
    }

    public function add(Request $request){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        return view('admin.desa.add', ['jenis_ukm'=>$jenis_ukm,'jabatan'=>$jabatan]);
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'lon' => 'required|numeric',
            'lat' => 'required|numeric',
            'luas_wilayah' => 'required|numeric',
        ]);

        // Membuat instance baru dari model Desa
        $desa = new Desa();
        $desa->nama_desa = $request->nama_desa;
        $desa->lon = $request->lon;
        $desa->lat = $request->lat;
        $desa->luas_wilayah = $request->luas_wilayah;

        // Menyimpan data ke database
        $desa->save();

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('mengelola_desa')->with('success', 'Data desa berhasil ditambahkan.');
    }


}
