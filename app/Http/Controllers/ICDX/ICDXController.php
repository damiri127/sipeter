<?php

namespace App\Http\Controllers\ICDX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ICDX;

class ICDXController extends Controller
{
    public function search_icdx (Request $request){
        $term = $request->get('term');
        $diagnoses = ICDX::where('nama_penyakit', 'LIKE', '%'.$term.'%')->orWhere('kode_icd', 'LIKE', '%'.$term.'%')->get();
        $result = [];

        foreach ($diagnoses as $diagnosis){
            $result[] = ['label'=>$diagnosis->nama_penyakit, 'value'=>$diagnosis->id_icd, 'desc'=>$diagnosis->kode_icd];
        }

        return response()->json($result);
    }
}
