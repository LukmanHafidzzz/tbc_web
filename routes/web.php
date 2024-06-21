<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PakarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [AuthController::class, 'login_view'])->name('login_view');
Route::get('/register', [AuthController::class, 'regis_view'])->name('regis_view');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard_user_view'])->name('dashboard_user_view');
    Route::get('/pendaftaran', [UserController::class, 'pendaftaran_user_view'])->name('pendaftaran_user_view');
    Route::post('/pendaftaran', [UserController::class, 'store'])->name('user.pendaftaran.store');
    Route::get('/hasil', [UserController::class, 'hasil_user_view'])->name('hasil_user_view');
    Route::get('/hasil/{id}', [UserController::class, 'detail_hasil'])->name('detail_hasil');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard_admin_view'])->name('dashboard_admin_view');

    Route::get('/admin/daftar-pengetahuan', [AdminController::class, 'pengetahuan_admin_view'])->name('pengetahuan_admin_view');
    Route::get('/admin/daftar-pengetahuan/{id}', [AdminController::class, 'update_pengetahuan_admin_view'])->name('update_pengetahuan_admin_view');
    Route::put('/admin/daftar-pengetahuan/{id}', [AdminController::class, 'update_pengetahuan_admin'])->name('update_pengetahuan_admin');
    Route::delete('/admin/daftar-pengetahuan/{id}', [AdminController::class, 'delete_pengetahuan_admin'])->name('delete_pengetahuan_admin');

    Route::get('/admin/kasus-lama', [AdminController::class, 'kasus_admin_view'])->name('kasus_admin_view');
    Route::get('/admin/kasus-lama/{id}', [AdminController::class, 'update_kasus_admin_view'])->name('update_kasus_admin_view');
    Route::put('/admin/kasus-lama/{id}', [AdminController::class, 'update_kasus_admin'])->name('update_kasus_admin');
    Route::delete('/admin/kasus-lama/{id}', [AdminController::class, 'delete_kasus_admin'])->name('delete_kasus_admin');

    Route::get('/pakar/dashboard', [PakarController::class, 'dashboard_pakar_view'])->name('dashboard_pakar_view');

    Route::get('/pakar/input-pengetahuan', [PakarController::class, 'input_pengetahuan_pakar_view'])->name('input_pengetahuan_pakar_view');
    Route::post('/pakar/input-pengetahuan', [PakarController::class, 'store_pengetahuan'])->name('store_pengetahuan');

    Route::get('/pakar/input-gejala', [PakarController::class, 'input_gejala_pakar_view'])->name('input_gejala_pakar_view');
    Route::post('/pakar/store-gejala', [PakarController::class, 'store_gejala'])->name('store_gejala');
});
