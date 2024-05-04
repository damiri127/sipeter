<?php

namespace App\Http\Controllers\PetugasLoket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasLoketController extends Controller
{
    //
    public function index(){
        return view('petugas_loket.index');
    }

    public function data_kunjungan(){
        return view('petugas_loket.mengelola_datakunjungan.data_kunjungan');
    }

    public function add_datakunjungan(){
        return view('petugas_loket.mengelola_datakunjungan.tambah_pengunjungbaru');
    }


}
