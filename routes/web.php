<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengaturanController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/postregister', [AuthController::class, 'postregister']);
Route::get('/logout', [AuthController::class, 'logout']);



Route::get('/dashboardaslab', function () {
    return view('aslab.dashboardaslab');
})->middleware(['auth'])->name('aslab.dashboardaslab');

Route::get('/dashboardpeserta', function () {
    return view('peserta.dashboardpeserta');
})->middleware(['auth'])->name('peserta.dashboardpeserta');

// untuk peserta
Route::get('/pendaftaranor', [PendaftaranController::class, 'index']);
Route::get('/pendaftaran/create', [PendaftaranController::class, 'create']); //simpan pendaftaran
Route::post('/pendaftaran/{id}/store', [PendaftaranController::class, 'store'])->name('simpan.pendaftaran'); //tambah pendaftaran
// Route::get('/pendaftaran/{id}/lihatpendaftaran', [PendaftaranController::class, 'lihatpendaftaran']); //simpan pendaftaran


// Route::get('/daftar', [PendaftaranController::class, 'daftar']);
Route::get('/lihatnilai', [PendaftaranController::class, 'lihatnilai']);
Route::get('/lihatpendaftaran', [PendaftaranController::class, 'lihatpendaftaran']);
Route::post('/lihatpendaftaran/{filezip}/download', [PendaftaranController::class, 'download'])->name('download.pendaftaran');
Route::get('/pengaturan', [PengaturanController::class, 'index']);
Route::get('/gantipassword', [PengaturanController::class, 'gantipassword']);
Route::post('/pengaturan/{id}/update', [PengaturanController::class, 'update'])->name('reset'); //tambah pendaftaran
Route::post('/gantipassword/{id}/updatepass', [PengaturanController::class, 'updatepass'])->name('resett'); //tambah pendaftaran





require __DIR__.'/auth.php';
