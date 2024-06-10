<?php


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

