<?php

use App\Http\Controllers\PetugasLoket\PetugasLoketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.layouts.admin');
});

Route::get('/petugas', function () {
    return view('petugas.layouts.petugas');
});

Route::get('/kepala-puskesmas', function () {
    return view('kepala-puskesmas.layouts.kepus');
});

Route::get('/petugas_loket', [PetugasLoketController::class, 'index'])->name('dashboard_petugasloket');
Route::get('/petugas_loket/datakunjungan', [PetugasLoketController::class, 'data_kunjungan'])->name('data_kunjungan');
Route::get('/petugas_loket/datakunjungan/inputkunjunganbaru', [PetugasLoketController::class,'add_datakunjungan'])->name('add_datakunjungan');


Route::get('/login', function () {
    return view('login');
});
