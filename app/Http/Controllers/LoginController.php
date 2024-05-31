<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function authentication(Request $request): RedirectResponse
    {
        //Validatie 
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        //Check Credentials
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd(Auth::user()->level);
            if (auth()->user()->level == "admin") {
                return redirect(route('admin'));
                //dd("admin ganteng");
            } elseif (auth()->user()->level == "kepala-puskesmas") {
                return redirect()->intended('kepala-puskesmas');
                //dd("kepala-puskesmas");
            } elseif (auth()->user()->level == "petugas-loket") {
                return redirect()->intended('petugas_loket');
            } else if(auth()->user()->level == "poliumum"){
                return redirect()->intended('poliumum');
            } else if(auth()->user()->level == "poligizi"){
                return redirect()->intended('poligizi');
            }

            return back()->withErrors('Error');
        }

        return redirect(route('login'))->with('error', 'Username dan Password yang anda masukan salah');

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/login');
    }
}
