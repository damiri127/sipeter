<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function authentication(Request $request):RedirectResponse{
        $credentials = $request->validate([
            'username' => ['required'], 
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            //dd(Auth::user()->level);
            if (auth()->user()->level === "admin") {
                return redirect()->to('admin');
                //dd("admin kontol");
            }elseif (auth()->user()->level == "kepala-puskesmas"){
                return redirect()->to('kepala-puskesmas');
                //dd("kepala-puskesmas");
            }elseif(auth()->user()->level == "petugas-loket"){
                return redirect()->to('petugas-loket');
            }
        }
        return back()->withErrors('gagal login cuyy');
        
    }
}
