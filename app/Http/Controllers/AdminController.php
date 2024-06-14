<?php

namespace App\Http\Controllers;

use App\Models\StrukturJabatan;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use App\Models\UKM;
class AdminController extends Controller
{
    public function index(){
        // $user = User::all();
        // return response()->json(['message' => "data berhasil diambil" ,'data' => $user ]);
        $data = StrukturJabatan::all();
        $jenis_ukm = UKM::all();
        return view('admin.data-struktur-jabatan.index', ['data'=>$data, 'jabatan'=>$data, 'jenis_ukm'=>$jenis_ukm]);
    }

    public function create(){
        $jabatan = StrukturJabatan::get();
        return view('admin.data-struktur-jabatan.create', ['jabatan'=>$jabatan]);
    }

    public function store(Request $request){
        $strukturJabatan = new StrukturJabatan;
        $strukturJabatan->nama_struktur_jabatan = $request->nama_struktur_jabatan;
        $strukturJabatan->save();

        return redirect(route('data_struktur_jabatan'))->with('success', 'Kamu berhasil nambahin data');
    }

    public function edit($id_struktur_jabatan){
        $data = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        $data = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        $jabatan = StrukturJabatan::get();
        $jenis_ukm = UKM::all();
        return view('admin.data-struktur-jabatan.edit', ['jabatan' => $jabatan, 'data' => $data, 'jenis_ukm' => $jenis_ukm]);
    }

    public function update(Request $request, $id_struktur_jabatan){
        // $data = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        // $data = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        // $data->nama_struktur_jabatan =
        DB::table('struktur_jabatan')->where('id_struktur_jabatan', $id_struktur_jabatan)->update([
            'nama_struktur_jabatan' => $request->nama_struktur_jabatan
        ]);

        return redirect(route('data_struktur_jabatan'));
    }

    public function delete($id_struktur_jabatan){
        StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->delete();

        return redirect(route('data_struktur_jabatan'));
    }

    public function sidebar(){
        $data = StrukturJabatan::all();
        return redirect(route('sidebar'));
    }
}
