<?php


use App\Http\Controllers\ICDX\ICDXController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoliUmum\PoliUmumController;
use App\Http\Controllers\PetugasLoket\PetugasLoketController;
use App\Http\Controllers\PetugasLoket\ArsipPengunjungController;
use App\Http\Controllers\PoliGizi\PoliGiziController;

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

// Route::get('/petugas', function () {
//     return view('petugas.layouts.petugas');
// });

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
    // mengarah ke dashboard admin
    Route::get('admin', [DashboardController::class, 'indexAdmin'])->name('admin');
});

Route::group(['middleware' => ['auth', 'ceklevel:kepala-puskesmas']], function(){
    // mengarah ke dashboard kepala puskesmas
    Route::get('/kepala-puskesmas', function () {
        return view('kepala-puskesmas.layouts.kepus');
    });
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,petugas-loket']], function(){
    Route::get('/petugas_loket', [PetugasLoketController::class, 'index'])->name('dashboard_petugasloket');
    Route::get('/petugas_loket/datakunjungan', [PetugasLoketController::class, 'data_kunjungan'])->name('data_kunjungan');
    Route::get('/petugas_loket/datakunjungan/inputkunjunganbaru/{NIK}', [PetugasLoketController::class,'add_datakunjungan'])->name('add_datakunjungan');
    Route::post('/petugas_loket/datakunjungan/insertkunjunganbaru', [PetugasLoketController::class,'insert_datapengunjung'])->name('insert_datakunjungan');
    Route::get('/petugas_loket/datakunjungan/editDataKunjungan/{id_kunjungan}', [PetugasLoketController::class,'edit_datakunjungan'])->name('edit_datakunjungan');
    Route::post('/petugas_loket/datakunjungan/updateKunjungan/{id_kunjungan}', [PetugasLoketController::class,'update_datakunjungan'])->name('update_datakunjungan');
    Route::get('/petugas_loket/datakunjungan/hapusKunjungan/{id_kunjungan}', [PetugasLoketController::class,'delete_datakunjungan'])->name('delete_datakunjungan');
    Route::post('/petugas_loket/datakunjungan/validasikunjunganlama', [PetugasLoketController::class,'validation_pengunjunglama'])->name('validation_pengunjunglama');
    Route::post('/petugas_loket/datakunjungan/inputKunjunganPengunjungLama/{id_pengunjung}', [PetugasLoketController::class,'insert_kunjunganPengunjungLama'])->name('insert_kunjunganPengunjungLama');


    Route::get('/petugas_loket/arsip-pengunjunng',[ArsipPengunjungController::class, 'index'])->name('index_arsippengunjung');
    Route::get('/petugas_loket/arsip-pengunjunng/add_datapengunjung',[ArsipPengunjungController::class, 'add_datapengunjung'])->name('add_datapengunjung');
    Route::post('/petugas_loket/arsip-pengunjunng/insert_datakunjungan',[ArsipPengunjungController::class, 'insert_datapengunjung'])->name('insert_datakunjunganarsip');
    Route::get('/petugas_loket/arsip-pengunjung/edit_data/{id_pengunjung}',[ArsipPengunjungController::class, 'edit_datapengunjung'])->name('edit_datapengunjung');
    Route::post('/petugas_loket/arsip-pengunjung/update_data/{id_pengunjung}',[ArsipPengunjungController::class, 'update_datapengunjung'])->name('update_datapengunjung');
    Route::get('/petugas_loket/arsip-pengunjung/delete_data/{id_pengunjung}',[ArsipPengunjungController::class, 'delete_datapengunjung'])->name('delete_datapengunjung');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,poliumum']], function () {
    // Route::get('/poliumum', [PoliUmumController::class, 'index'])->name('dashboard_poliumum');
    // Route::get('/poliumum/datakunjungan', [PoliUmumController::class, 'data_poli'])->name('data_poliumum');
    // Route::get('/poliumum/datakunjungan/update/{id_kunjungan}', [PoliUmumController::class, 'add_rekammedis'])->name('add_rekammedis');
    // Route::get('/poliumum/search-icdx', [ICDXController::class, 'search_icdx'])->name('search_icdx');
    // Route::get('/poliumum/datakunjungan/edit/{id_kunjungan}', [PoliUmumController::class, 'update_rekammedis']);
    Route::resource('/poliumum', PoliumumController::class);
});

Route::group(['middleware' => ['auth', 'ceklevel:admin,poligizi']], function(){ 
    Route::get('/poligizi', [PoliGiziController::class, 'index'])->name('dashboard_poligizi');
    Route::get('/poligizi/data_kunjunganpasien', [PoliGiziController::class, 'data_kunjungan'])->name('data_kunjunganpoligizi');
    Route::get('/poligizi/data_kunjunganpasien/{id_kunjungan}', [PoliGiziController::class, 'add_rekammedis'])->name('add_rekammedispoligizi');
    Route::get('/poligizi/search-icdx', [ICDXController::class, 'search_icdx'])->name('search_icdx');
    
    
    // Route::get('/poliumum/datakunjungan', [PoliUmumController::class, 'data_poli'])->name('data_poliumum');
});


//Route Login

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authentication']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

