<?php

namespace App\Http\Controllers\PoliUmum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PoliUmumController extends Controller
{
    public function index(){
        return view('poli-umum.layouts.layout');
    }

    public function data_poli(){
        return view('poli-umum.mengelola_kunjungan.index');
    }
}
