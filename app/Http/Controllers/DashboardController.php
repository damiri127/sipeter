<?php

namespace App\Http\Controllers;

use App\Models\StrukturJabatan;
use App\Models\UKM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin(){
        $jabatan = StrukturJabatan::get();
        $jenis_ukm = UKM::all();
        return view('admin.index', [
            'name' => 'admin', 
            'jabatan' => $jabatan, 
            'jenis_ukm' => $jenis_ukm
        ]);
    }


}
