<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/postregister', [AuthController::class, 'postregister']);
Route::get('/logout', [AuthController::class, 'logout']);

// Route::get('/', function () {
//     return view('auth.login');
// });

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

use App\Http\Controllers\InformasiController;
// Route::get('/dashboardaslab', [InformasiController::class, 'index']);
Route::post('/add_process', [InformasiController::class, 'add_process']);
Route::get('/detail/{id}', [InformasiController::class, 'detail']);
Route::get('/edit/{id}', [InformasiController::class, 'edit']);
Route::post('/edit_process', [InformasiController::class, 'edit_process']);
Route::get('/delete/{id}', [InformasiController::class, 'destroy']);



Route::get('/dashboardaslab', [InformasiController::class, 'index'])
        ->middleware(['auth'])->name('aslab.dashboardaslab');

require __DIR__.'/auth.php';
