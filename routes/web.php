<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ICDX\ICDXController;
use App\Http\Controllers\PoliGizi\PoliGiziController;
use App\Http\Controllers\PoliUmum\PoliUmumController;
use App\Http\Controllers\PetugasLoket\PetugasLoketController;
use App\Http\Controllers\PetugasLoket\ArsipPengunjungController;

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

