<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramUkm;
use App\Models\StrukturJabatan;
use App\Models\UKM;
use Illuminate\Http\Request;

class KesehatanLingkunganController extends Controller
{
    public function index(){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $program_ukm = ProgramUkm::where('nama_program_ukm', "Kesehatan Lingkungan")
        ->leftJoin('users', 'program_ukm.penanggung_jawab_program_ukm', '=', 'users.id')
        ->get();

     
        return view('admin.kesehatan-lingkungan.index', ['jenis_ukm'=>$jenis_ukm,'jabatan'=>$jabatan, 'program_ukm'=>$program_ukm ]);
    }
}
