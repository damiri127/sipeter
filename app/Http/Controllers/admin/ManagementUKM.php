<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturJabatan;
use App\Models\UKM;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class ManagementUKM extends Controller
{
    public function index(){
        $jabatan = StrukturJabatan::all();
        $ukm = UKM::leftJoin('users', 'ukm.penanggung_jawab_ukm', '=', 'users.id')->get();
        $jenis_ukm = UKM::all();
        return view('admin.ukm.index', ['jabatan' => $jabatan, 'ukm' => $ukm, 'jenis_ukm' => $jenis_ukm]);
    }

    // Controller
public function search_pj_ukm(Request $request) {
    $term = $request->get('term');
    $pj_ukm = User::where('level', 'petugas-ukm')->whereNot('id', 'ukm.penanggung_jawab_sub_kategori_ukm' )
                    ->where(function($query) use ($term) {
                       $query->where('nama', 'LIKE', '%'.$term.'%')
                             ->orWhere('nip', 'LIKE', '%'.$term.'%');
                   })->get();
    
    $result = [];
    foreach($pj_ukm as $pj) {
        $result[] = ['label' => $pj->nama, 'value' => $pj->id, 'desc' => $pj->nip];
    }
    return response()->json($result);
}

    public function add(){
        $jabatan = StrukturJabatan::all();
        $jenis_ukm = UKM::all();
        return view('admin.ukm.add', ['jabatan'=>$jabatan, 'jenis_ukm'=>$jenis_ukm]);
    }

    public function store(Request $request){
        try{
            $ukm = new UKM();

            $ukm->nama_jenis_ukm = $request->nama_ukm;
            $ukm->penanggung_jawab_ukm = $request->penanggung_jawab_ukm;
            $ukm->save();
    
            return redirect(route('mengelola_ukm'))->with('success', 'Data berhasil ditambahkan');
        } catch(Exception $e){
            return redirect(route('mengelola_ukm'))->with('error', $e->getMessage());
        }
    }

    public function edit($id_ukm){
        $jabatan = StrukturJabatan::all();
        $ukm = UKM::where('id_ukm', $id_ukm)->leftJoin('users', 'ukm.penanggung_jawab_ukm', '=', 'users.id')->first();
        $jenis_ukm = UKM::all();
        return view('admin.ukm.edit', ['jabatan' => $jabatan, 'ukm' => $ukm, 'jenis_ukm' => $jenis_ukm]);   
    }

    public function update(Request $request, $id_ukm){

        try{

            UKM::where('id_ukm', $id_ukm)->update([
                'nama_jenis_ukm'=>$request->nama_ukm,
                'penanggung_jawab_ukm'=> $request->penanggung_jawab_ukm
            ]);
                
                return redirect(route('mengelola_ukm'))->with('success','Data berhasil diubah');

        }catch (Exception $e) {

            return redirect(route('mengelola_ukm'))->with('error', $e->getMessage());
            
        }

    }

    public function delete($id_ukm){
        try{
            UKM::where('id_ukm',$id_ukm)->delete();
            return redirect(route('mengelola_ukm'))->with('success','Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect(route('mengelola_ukm'))->with('error', $e->getMessage());
        }
    }
}
