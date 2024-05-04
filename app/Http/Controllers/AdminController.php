<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = User::all();
        return response()->json(['message' => "data berhasil diambil" ,'data' => $user ]);
    }
}
