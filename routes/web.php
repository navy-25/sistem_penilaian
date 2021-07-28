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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/beranda', [App\Http\Controllers\BerandaController::class, 'index']);
Route::get('/akun-siswa', [App\Http\Controllers\AkunSiswaController::class, 'index']);
Route::get('/akun-siswa/{id}', [App\Http\Controllers\AkunSiswaController::class, 'read']);
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index']);
Route::get('/kelas/{id}/{name}/{id_tugas}/tugas', [App\Http\Controllers\KelasController::class, 'kelola_tugas']);
Route::get('/kelas/{id}/{name}/masuk-kelas', [App\Http\Controllers\KelasController::class, 'kelolaKelas']);
Route::get('/{id_praktik}/{name_praktik}', [App\Http\Controllers\KelasController::class, 'kelolaPraktik']);
Route::get('/{id_praktik}/{name_praktik}/{id_nilai}', [App\Http\Controllers\KelasController::class, 'updateNilai']);
Route::get('/pengaturan', [App\Http\Controllers\PengaturanController::class, 'index']);
Route::post('/pengaturan/{id}/update', [App\Http\Controllers\PengaturanController::class, 'update']);
Route::post('/pengaturan/{id}/ganti-password', [App\Http\Controllers\PengaturanController::class, 'ganti_password']);
Route::get('/pengaturan/{id}/hapus-akun', [App\Http\Controllers\PengaturanController::class, 'hapus_akun']);

// Route::group(['middleware'=>['auth','role:Admin,Guru']],function(){
    Route::get('/akun-siswa/{id_siswa}/hapus', [App\Http\Controllers\AkunSiswaController::class, 'destroy']);
    Route::post('/akun-siswa/{id}/update', [App\Http\Controllers\AkunSiswaController::class, 'update']);
    Route::post('/akun-siswa/store', [App\Http\Controllers\AkunSiswaController::class, 'store']);
    
    Route::post('/kelas/store', [App\Http\Controllers\KelasController::class, 'store']);
    Route::get('/kelas/{id}/destroy', [App\Http\Controllers\KelasController::class, 'destroy']);
    Route::get('/kelas/{id}/{name}', [App\Http\Controllers\KelasController::class, 'edit']);
    
    Route::post('/kelas/{id}/{name}/{id_tugas}/tugas/beri_nilai', [App\Http\Controllers\KelasController::class, 'beri_nilai_tugas']);
    Route::post('/kelas/{id}/{name}/masuk-kelas/upload-modul', [App\Http\Controllers\KelasController::class, 'tambah_modul']);
    Route::post('/kelas/{id}/{name}/masuk-kelas/upload-tugas', [App\Http\Controllers\KelasController::class, 'tambah_tugas']);
    Route::get('/kelas/{id}/{name}/masuk-kelas/{id_modul}/hapus-modul', [App\Http\Controllers\KelasController::class, 'destroy_modul']);
    Route::post('/kelas/{id}/{name}/masuk-kelas/tambah-kontributor', [App\Http\Controllers\KelasController::class, 'tambah_kontributor']);
    Route::get('/kelas/{id}/{name}/masuk-kelas/hapus-kontributor', [App\Http\Controllers\KelasController::class, 'hapus_kontributor']);
    Route::post('/kelas/{id}/update', [App\Http\Controllers\KelasController::class, 'update']);
    Route::post('/{id}/{name_praktik}/store', [App\Http\Controllers\KelasController::class, 'store_nilai_praktik']);
    Route::get('/{id}/{name_praktik}/{id_nilai}/destroy', [App\Http\Controllers\KelasController::class, 'destroy_nilai_praktik']);
    Route::get('/{id_praktik}/{name_praktik}/feedback', [App\Http\Controllers\KelasController::class, 'feedbackPraktik']);
    
    Route::get('/nilai', [App\Http\Controllers\NilaiController::class, 'index']);
    Route::post('/nilai/store', [App\Http\Controllers\NilaiController::class, 'store']);
    Route::get('/nilai/{id}/destroy', [App\Http\Controllers\NilaiController::class, 'destroy']);
    Route::get('/nilai/{id}/{name}/list_variabel', [App\Http\Controllers\NilaiController::class, 'variabelNilai']);
    Route::get('/nilai/{id}/{name}/{id_sub_var}/destroy', [App\Http\Controllers\NilaiController::class, 'destroy_sub_variabel']);
    Route::post('/nilai/{id}/{name}/store', [App\Http\Controllers\NilaiController::class, 'store_sub_variabel']);
// });

// Route::group(['middleware'=>['auth','role:Siswa']],function(){
    Route::post('/kelas/{id}/{name}/{id_tugas}/tugas/upload_tugas_siswa', [App\Http\Controllers\KelasController::class, 'upload_tugas_siswa']);
// });
