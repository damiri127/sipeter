<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturJabatan;
use App\Models\SubKategoriUKM;
use Illuminate\Http\Request;
use App\Models\UKM;
use Exception;

class ManagementSubUKM extends Controller
{
    public function index($id_ukm){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $sub_ukm = SubKategoriUKM::where('id_ukm',$id_ukm)->leftJoin('users', 'sub_kategori_ukm.penanggung_jawab_sub_kategori_ukm', '=', 'users.id')->get();
        $ukm = UKM::where('id_ukm',$id_ukm)->first();

        return view('admin.sub_divisi_ukm.index', ['jenis_ukm'=>$jenis_ukm, 'sub_ukm'=>$sub_ukm, 'jabatan'=>$jabatan, 'ukm'=>$ukm]);
    }

    public function add($id_ukm){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $ukm = UKM::where('id_ukm',$id_ukm)->first();
        return view('admin.sub_divisi_ukm.add', ['jenis_ukm'=>$jenis_ukm, 'jabatan'=>$jabatan, 'ukm'=>$ukm]);
    }

    public function store(Request $request, $id_ukm){
        $sub_kategori_ukm = new SubKategoriUKM();

        $checkDuplicateinUkm = UKM::where('penanggung_jawab_ukm', $request->penanggung_jawab_sub_kategori_ukm)->first();
        if($checkDuplicateinUkm != null){
            return redirect()->back()->with('error', "Silahkan pilih penanggung jawab yang lain");
        }

        try{
            $sub_kategori_ukm->id_ukm = $id_ukm ;
            $sub_kategori_ukm->nama_sub_kategori_ukm = $request->nama_sub_kategori_ukm;
            $sub_kategori_ukm->penanggung_jawab_sub_kategori_ukm = $request->penanggung_jawab_sub_kategori_ukm;
            $sub_kategori_ukm->save();
    
            return redirect(route('mengelola_subdivisi_ukm', ['id_ukm'=>$id_ukm]))->with('success', 'Data berhasil ditambahkan');

        } catch (Exception $e) {
            return redirect(route('mengelola_subdivisi_ukm', ['id_ukm'=>$id_ukm]))->with('error', $e->getMessage());
        }
    }

    public function edit($id_sub_kategori_ukm){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $sub_kategori_ukm = SubKategoriUKM::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)->leftJoin('users', 'sub_kategori_ukm.penanggung_jawab_sub_kategori_ukm', '=', 'users.id')->first();
        $ukm = UKM::where('id_ukm',$sub_kategori_ukm->id_ukm)->first();
        return view('admin.sub_divisi_ukm.edit', ['divisi_ukm'=>$sub_kategori_ukm, 'jenis_ukm'=>$jenis_ukm, 'jabatan'=>$jabatan, 'ukm'=>$ukm]);
    }

    public function update(Request $request, $id_sub_kategori_ukm){
        $sub_kategori_ukm = SubKategoriUKM::where('id_sub_kategori_ukm',$id_sub_kategori_ukm)->first();

        $checkDuplicateinUkm = UKM::where('penanggung_jawab_ukm', $request->penanggung_jawab_sub_kategori_ukm)->first();
        if($checkDuplicateinUkm != null){
            return redirect()->back()->with('error', "Silahkan pilih penanggung jawab yang lain");
        }

        try {
            SubKategoriUKM::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)->update([
                "nama_sub_kategori_ukm"=>$request->nama_sub_kategori_ukm,
                "penanggung_jawab_sub_kategori_ukm"=>$request->penanggung_jawab_sub_kategori_ukm
            ]);

            return redirect(route('mengelola_subdivisi_ukm', ['id_ukm'=>$sub_kategori_ukm->id_ukm]))->with('success', 'Data berhasil diperbarui');

        } catch(Exception $e) {
            
            return redirect()->back()->with('error', "Silahkan pilih penanggung jawab yang lain");
        }
    }

    public function delete($id_sub_kategori_ukm){
        try{
            SubKategoriUKM::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)->delete();
            return redirect()->back()->with('success', "Data Berhasil Dihapus");

        } catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
