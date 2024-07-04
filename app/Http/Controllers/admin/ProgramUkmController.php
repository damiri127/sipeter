<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturJabatan;
use App\Models\SubKategoriUKM;
use App\Models\UKM;
use Exception;
use Illuminate\Http\Request;
use App\Models\ProgramUkm;

class ProgramUkmController extends Controller
{
    public function index($id_sub_kategori_ukm){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $program_ukm = ProgramUkm::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)
        ->leftJoin('users', 'program_ukm.penanggung_jawab_program_ukm', '=', 'users.id')
        ->get();

        $sub_kategori_ukm = SubKategoriUKM::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)->first();

        return view('admin.program-ukm.index', ['jenis_ukm'=>$jenis_ukm, 'jabatan'=>$jabatan, 'program_ukm'=>$program_ukm, 'sub_kategori_ukm'=>$sub_kategori_ukm]);
    
    }

    public function add($id_sub_kategori_ukm){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        $sub_kategori_ukm = SubKategoriUKM::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)->first();

        return view('admin.program-ukm.add', ['jenis_ukm'=>$jenis_ukm, 'jabatan'=>$jabatan, 'sub_kategori_ukm'=>$sub_kategori_ukm]);
    
    }

    public function store(Request $request, $id_sub_kategori_ukm){
        $program_ukm = new ProgramUkm();

        $checkKetuaUKM = UKM::where('penanggung_jawab_ukm', $request->penanggung_jawab_program_ukm)->first();
        $checkKetuaSubUKM = SubKategoriUKM::where('penanggung_jawab_sub_kategori_ukm', $request->penanggung_jawab_program_ukm)->first();
        if($checkKetuaUKM != null){
            return redirect()->back()->with('error', 'Silahkan pilih penanggung jawab lain');
        }
        if($checkKetuaSubUKM != null){
            return redirect()->back()->with('error', 'Silahkan pilih penanggung jawab lain');
        }

        try{
            $program_ukm->id_sub_kategori_ukm = $id_sub_kategori_ukm;
            $program_ukm->nama_program_ukm = $request->nama_program_ukm;
            $program_ukm->penanggung_jawab_program_ukm = $request->penanggung_jawab_program_ukm;
            $program_ukm->save();

            return redirect(route('mengelola_program_ukm', ['id_sub_kategori_ukm'=>$id_sub_kategori_ukm]))->with('success','Data berhasil ditambahkkan');

        } catch(Exception $e) {

            return redirect()->back()->with('error', 'Silahkan pilih penanggung jawab lain');
        }
    }

    public function edit($id_program_ukm){
        $jenis_ukm = UKM::all();
        $jabatan = StrukturJabatan::all();
        //$sub_kategori_ukm = SubKategoriUKM::where('id_sub_kategori_ukm', $id_sub_kategori_ukm)->first();

        try{
            $program_ukm = ProgramUkm::where('id_program_ukm', $id_program_ukm)
            ->leftJoin('sub_kategori_ukm', 'program_ukm.id_sub_kategori_ukm', '=', 'sub_kategori_ukm.id_sub_kategori_ukm')
            ->leftJoin('users', 'program_ukm.penanggung_jawab_program_ukm', '=', 'users.id')
            ->first();
            return view('admin.program-ukm.edit', ['jenis_ukm'=>$jenis_ukm, 'jabatan'=>$jabatan, 'program_ukm'=>$program_ukm]);
        } catch(Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request ,$id_program_ukm){
        $program_ukm = ProgramUkm::where('id_program_ukm', $id_program_ukm)
        ->leftJoin('sub_kategori_ukm', 'program_ukm.id_sub_kategori_ukm', '=', 'sub_kategori_ukm.id_sub_kategori_ukm')
        ->leftJoin('users', 'program_ukm.penanggung_jawab_program_ukm', '=', 'users.id')
        ->first();
        

        $checkKetuaUKM = UKM::where('penanggung_jawab_ukm', $request->penanggung_jawab_program_ukm)->first();
        $checkKetuaSubUKM = SubKategoriUKM::where('penanggung_jawab_sub_kategori_ukm', $request->penanggung_jawab_program_ukm)->first();
        if($checkKetuaUKM != null){
            return redirect()->back()->with('error', 'Silahkan pilih penanggung jawab lain');
        }
        if($checkKetuaSubUKM != null){
            return redirect()->back()->with('error', 'Silahkan pilih penanggung jawab lain');
        }
    
        
        try {
            ProgramUkm::where('id_program_ukm', $id_program_ukm)->update([
                "nama_program_ukm"=>$request->nama_program_ukm,
                "penanggung_jawab_program_ukm"=>$request->penanggung_jawab_program_ukm
            ]);
            return redirect(route('mengelola_program_ukm', ['id_sub_kategori_ukm'=>$program_ukm->id_sub_kategori_ukm]))->with('success','Data berhasil diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function delete($id_program_ukm){
        try{
            ProgramUkm::where('id_program_ukm',$id_program_ukm)->delete();
            return redirect()->back()->with('success','Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



}
