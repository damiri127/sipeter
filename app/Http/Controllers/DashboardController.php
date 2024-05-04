<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin(){
        return view('admin.layouts.admin', [
            'name' => 'admin'
        ]);
    }
}
