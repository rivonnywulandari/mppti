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

Route::get('/add', function () {
    return view('aslab.addInfo');
});

use App\Http\Controllers\InformasiController;
Route::get('/info', [InformasiController::class, 'index']);
Route::post('/add_process', [InformasiController::class, 'add_process']);
Route::get('/detail/{id}', [InformasiController::class, 'detail']);
Route::get('/edit/{id}', [InformasiController::class, 'edit']);
Route::post('/edit_process', [InformasiController::class, 'edit_process']);
Route::get('/delete/{id}', [InformasiController::class, 'destroy']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
