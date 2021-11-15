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

Route::get('/dashboardkalab', function () {
    return view('kalab.dashboardkalab');
})->middleware(['auth'])->name('kalab.dashboardkalab');

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




Route::get('/addinfo', function () {
    return view('aslab.addInfo'); //halaman form tambah info
});
Route::get('/addSeleksi', function () {
    return view('aslab.addSeleksi'); //halaman form tambah seleksi
});

use App\Http\Controllers\JenisSeleksiController;
Route::get('/seleksi', [JenisSeleksiController::class, 'index']); //daftar seleksi *untuk input
Route::post('/tambah_seleksi', [JenisSeleksiController::class, 'add_process']); //proses menambah seleksi
Route::get('/seleksi_edit', [JenisSeleksiController::class, 'index_edit']);


use App\Http\Controllers\SeleksiController;
Route::post('/input_nilai', [SeleksiController::class, 'input_nilai']); //input nilai
Route::get('/daftarnilai/{ids}', [SeleksiController::class, 'index']); //melihat daftar nilai peserta pada salah satu tahap
Route::get('/input/{id}/{ids}', [SeleksiController::class, 'tampil_input']); //input nilai
Route::get('/menupenilaian', [SeleksiController::class, 'menu']); //halaman menu input/edit nilai peserta
Route::get('/daftarnilai_edit/{ids}', [SeleksiController::class, 'index_edit']);
Route::get('/edit_nilai/{id}/{ids}', [SeleksiController::class, 'tampil_edit']);
Route::post('/edit_nilai_process', [SeleksiController::class, 'edit_nilai_process']);
Route::get('/destroy/{id}', [SeleksiController::class, 'destroy']);

use App\Http\Controllers\InformasiController;
// Route::get('/dashboardaslab', [InformasiController::class, 'index']);
Route::post('/add_process', [InformasiController::class, 'add_process']);
Route::get('/detail/{id}', [InformasiController::class, 'detail']);
Route::get('/edit/{id}', [InformasiController::class, 'edit']);
Route::post('/edit_process', [InformasiController::class, 'edit_process']);
Route::get('/delete/{id}', [InformasiController::class, 'destroy']);

use App\Http\Controllers\DataPesertaController;
Route::get('/daftar_peserta', [DataPesertaController::class, 'index']);
Route::get('/detail_data/{id}', [DataPesertaController::class, 'detail_data']);
Route::get('/edit/{id}', [DataPesertaController::class, 'edit']);
Route::post('/edit_status', [DataPesertaController::class, 'edit_status']);


Route::get('/dashboardaslab', [InformasiController::class, 'index'])
        ->middleware(['auth'])->name('aslab.dashboardaslab');

use App\Http\Controllers\KalabController;
Route::get('/dashboardkalab', [KalabController::class, 'index'])
        ->middleware(['auth'])->name('kalab.dashboardkalab');
Route::get('/daftartahap', [KalabController::class, 'tahap']);
Route::get('/daftarnilaipeserta/{ids}', [KalabController::class, 'nilai_peserta']);

require __DIR__.'/auth.php';
