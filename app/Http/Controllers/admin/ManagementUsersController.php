<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StrukturJabatan;
use App\Models\UKM;
class ManagementUsersController extends Controller
{
    public function index($id_struktur_jabatan) {
        $users = User::where('id_struktur_jabatan', $id_struktur_jabatan)->get();
        $jabatan = StrukturJabatan::all();
        $level = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        $jenis_ukm = UKM::all();
        return view('admin.management-users.index', ['users' => $users, 'jabatan' => $jabatan, 'level' => $level, 'jenis_ukm' => $jenis_ukm]);
    }

    public function add($id_struktur_jabatan){
        $jabatan = StrukturJabatan::all();
        $level = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();
        $jenis_ukm = UKM::all();
        return view('admin.management-users.add', ['id_struktur_jabatan' => $id_struktur_jabatan,'jabatan'=>$jabatan, 'level' =>$level, 'jenis_ukm' =>$jenis_ukm]);
    }

    public function store (Request $request, $id_struktur_jabatan){
        $level = StrukturJabatan::where('id_struktur_jabatan', $id_struktur_jabatan)->first();

        $checkNIP = User::where('nip', $request->nip)->first();
        if($checkNIP != null){
            return redirect(route('mengelola_pengguna', ['id_struktur_jabatan' => $id_struktur_jabatan]))->with('error', 'Duplikasi NIP, data gagal diinputkan');
        }

        $user = new User();
        $user->id_struktur_jabatan = $id_struktur_jabatan;
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt('developers');
        $user->level = $level->nama_struktur_jabatan;
        $user->save();

        return redirect(route('mengelola_pengguna', ['id_struktur_jabatan'=>$id_struktur_jabatan]))->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id){
        $jabatan = StrukturJabatan::all();
        $user = User::find($id);
        $level = StrukturJabatan::where('id_struktur_jabatan', $user->id_struktur_jabatan)->first();
        $jenis_ukm = UKM::all();
        return view('admin.management-users.edit', ['user'=>$user, 'jabatan'=>$jabatan, 'level'=>$level, 'jenis_ukm'=>$jenis_ukm]);
    }

    public function update(Request $request, $id){
        $user=User::find($id);
        // $checkNIP = User::where('nip', $request->nip)->first();
        // // Check Duplikasi NIP
        // if($checkNIP->id != $user->id){
        //     // return redirect(route('mengelola_pengguna', ['id_struktur_jabatan' => $user->id_struktur_jabatan]))->with('error', 'Duplikasi NIP, data gagal diinputkan');
        //     return redirect()->back()->with('error', 'Duplikasi NIP, data gagal diinputkan');
        // }

        // //Input Perubahan
        // $level = StrukturJabatan::where('id_struktur_jabatan', $request->id_struktur_jabatan)->first();
        // $user->nip = $request->nip;
        // $user->nama = $request->nama;
        // $user->username = $request->username;
        // $user->password = $request->password;
        // $user->level = $level->nama_struktur_jabatan;
        // $user->id_struktur_jabatan= $request->id_struktur_jabatan;
        // $user->update();

        try{
            $level = StrukturJabatan::where('id_struktur_jabatan', $request->id_struktur_jabatan)->first();
            $user->nip = $request->nip;
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->level = $level->nama_struktur_jabatan;
            $user->id_struktur_jabatan= $request->id_struktur_jabatan;
            $user->update();
            return redirect(route('mengelola_pengguna', ['id_struktur_jabatan'=>$request->id_struktur_jabatan]))->with('success', 'Data berhasil diperbarui');
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Duplikasi NIP, data gagal diinputkan');
        }

        // return redirect(route('mengelola_pengguna', ['id_struktur_jabatan'=>$request->id_struktur_jabatan]))->with('success', 'Data berhasil diperbarui');
    }

    public function delete(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }
            $user->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            // Menangani error yang terjadi saat penghapusan, misalnya karena constraint dari foreign key
            return redirect()->back()->with('error', 'Data gagal dihapus: ' . $e->getMessage());
        }
    }
}
