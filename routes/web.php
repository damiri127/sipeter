<?php


use App\Http\Controllers\admin\ManagementSubUKM;
use App\Http\Controllers\admin\ManagementUKM;
use App\Http\Controllers\admin\ManagementUsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


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
    Route::get('/admin/data-struktur-jabatan', [AdminController::class, 'index'])->name('data_struktur_jabatan');
    Route::get('/admin/data-struktur-jabatan/create', [AdminController::class, 'create'])->name('create_jabatan');
    Route::post('/admin/data-struktur-jabatan', [AdminController::class, 'store'])->name('store_jabatan');
    Route::get('/admin/data-struktur-jabatan/edit/{id_struktur_jabatan}', [AdminController::class, 'edit'])->name('edit_jabatan');
    Route::post('/admin/data-struktur-jabatan/update/{id_struktur_jabatan}', [AdminController::class, 'update'])->name('update_jabatan');
    Route::get('/admin/data-struktur-jabatan/delete/{id_struktur_jabatan}', [AdminController::class, 'delete'])->name('delete_jabatan');
    //Route::get('/admin/data-struktur_jabatan/sidebar', [AdminController::class, 'sidebar'])->name('sidebar');

    Route::get('/admin/data-user/{id_struktur_jabatan}', [ManagementUsersController::class, 'index'])->name('mengelola_pengguna');
    Route::get('/admin/data-user/add-user/{id_struktur_jabatan}', [ManagementUsersController::class, 'add'])->name('tambah_pengguna');
    Route::post('/admin/data-user/insert-user/{id_struktur_jabatan}', [ManagementUsersController::class, 'store'])->name('insert_pengguna');
    Route::get('/admin/data-user/edit-user/{id}', [ManagementUsersController::class, 'edit'])->name('edit_pengguna');
    Route::post('/admin/data-user/update-user/{id}', [ManagementUsersController::class, 'update'])->name('update_pengguna');
    Route::get('/admin/data-user/delete-user/{id}', [ManagementUsersController::class, 'delete'])->name('delete_pengguna');

    // Management UKM
    Route::get('/admin/data-ukm/', [ManagementUKM::class, 'index'])->name('mengelola_ukm');
    Route::get('/admin/add-data-ukm/', [ManagementUKM::class, 'add'])->name('tambah_ukm');
    Route::post('/admin/insert-data-ukm/', [ManagementUKM::class, 'store'])->name('simpan_ukm');
    Route::get('/admin/edit-data-ukm/{id_ukm}', [ManagementUKM::class, 'edit'])->name('edit_ukm');
    Route::post('/admin/update-data-ukm/{id_ukm}', [ManagementUKM::class, 'update'])->name('update_ukm');
    Route::get('/admin/delete-data-ukm/{id_ukm}', [ManagementUKM::class, 'delete'])->name('delete_ukm');
    
    // Search User 
    Route::get('/admin/data-pj-ukm/', [ManagementUKM::class, 'search_pj_ukm'])->name('search_pj_ukm');


    //Management Subdivisi UKM 
    Route::get('/admin/data-subdivisi-ukm/{id_ukm}', [ManagementSubUKM::class, 'index'])->name('mengelola_subdivisi_ukm');
    Route::get('/admin/add-data-subdivisi-ukm/{id_ukm}', [ManagementSubUKM::class, 'add'])->name('add_subdivisi_ukm');
    Route::post('/admin/store-data-subdivisi-ukm/{id_ukm}', [ManagementSubUKM::class, 'store'])->name('store_subdivisi_ukm');
    Route::get('/admin/edit-data-subdivisi-ukm/{id_sub_kategori_ukm}', [ManagementSubUKM::class, 'edit'])->name('edit_subdivisi_ukm');
    Route::post('/admin/update-data-subdivisi-ukm/{id_sub_kategori_ukm}', [ManagementSubUKM::class, 'update'])->name('update_subdivisi_ukm');
    Route::get('/admin/delete-data-subdivisi-ukm/{id_sub_kategori_ukm}', [ManagementSubUKM::class, 'delete'])->name('delete_subdivisi_ukm');
    
    
    
});

Route::group(['middleware' => ['auth', 'ceklevel:kepala-puskesmas']], function(){
    // mengarah ke dashboard kepala puskesmas
    Route::get('/kepala-puskesmas', function () {
        return view('kepala-puskesmas.layouts.kepus');
    });
});

//Route Login

Route::get('/login', function () {
    return view('login_template');
})->name('login');

Route::get('/', function () {
    if(Auth::check()){
        if(auth()->user()->level=="admin"){
            return redirect(route('admin'));
        }
    }
    return redirect(route('login'));
});

Route::get('/login-test', function () {
    return view('login_template');
})->name('login_test');

Route::post('/login', [LoginController::class, 'authentication'])->name('post_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

