<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/petugas', function () {
    return view('petugas.layouts.petugas');
});

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function(){
    // mengarah ke dashboard admin
    Route::get('/admin', [DashboardController::class, 'indexAdmin'])->name('admin');
});

Route::group(['middleware' => ['auth', 'ceklevel:kepala-puskesmas']], function(){
    // mengarah ke dashboard kepala puskesmas
    Route::get('/kepala-puskesmas', function () {
        return view('kepala-puskesmas.layouts.kepus');
    });
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authentication']);
