<?php

namespace App\Http\Controllers;

use App\Models\StrukturJabatan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // $user = User::all();
        // return response()->json(['message' => "data berhasil diambil" ,'data' => $user ]);
        $data = StrukturJabatan::all();
        return view('admin.data-struktur-jabatan.index', compact('data'));
    }

    public function create(){
        return view('admin.data-struktur-jabatan.create');
    }

    public function store(Request $request){
        $strukturJabatan = new StrukturJabatan;
        $strukturJabatan->nama_struktur_jabatan = $request->nama_struktur_jabatan;
        $strukturJabatan->save();

        return redirect(route('data_struktur_jabatan'))->with('success', 'Kamu berhasil nambahin data');
    }

    public function edit($id_struktur_jabatan){
        $data = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        #$data = StrukturJabatan::find($id_struktur_jabatan);
        return view('admin.data-struktur-jabatan.edit', ['data' => $data]);
    }

    public function update(Request $request, $id_struktur_jabatan){
        #$data = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        $data = StrukturJabatan::findOrFail($id_struktur_jabatan);
        $data->nama_struktur_jabatan = $request->nama_struktur_jabatan;
        $data->update();

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
