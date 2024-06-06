<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliumumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('poli-umum.layouts.layout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_kunjungan)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
