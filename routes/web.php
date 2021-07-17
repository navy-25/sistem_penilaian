<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin/beranda', [App\Http\Controllers\BerandaController::class, 'index']);
Route::get('/admin/akun-siswa', [App\Http\Controllers\AkunSiswaController::class, 'index']);
Route::get('/admin/akun-siswa/nama-siswa', [App\Http\Controllers\AkunSiswaController::class, 'read']);

Route::get('/admin/kelas', [App\Http\Controllers\KelasController::class, 'index']);
Route::get('/admin/kelas/nama-kelas', [App\Http\Controllers\KelasController::class, 'update']);
Route::get('/admin/kelas/nama-kelas/kelola', [App\Http\Controllers\KelasController::class, 'kelolaKelas']);
Route::get('/admin/kelas/nama-kelas/kelola/praktik', [App\Http\Controllers\KelasController::class, 'kelolaPraktik']);
Route::get('/admin/kelas/nama-kelas/kelola/nilai', [App\Http\Controllers\KelasController::class, 'kelolaNilai']);
Route::get('/admin/rekab', [App\Http\Controllers\RekabController::class, 'index']);
Route::get('/admin/nilai', [App\Http\Controllers\NilaiController::class, 'index']);
Route::get('/admin/nilai/variabel-nilai', [App\Http\Controllers\NilaiController::class, 'variabelNilai']);
Route::get('/admin/pengaturan', [App\Http\Controllers\PengaturanController::class, 'index']);