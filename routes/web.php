<?php

use App\Http\Controllers\AnggotalccController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KehadiranPrintController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('master.index');
// });

Route::get('/',[IndexController::class,'index']);
Route::get('/Login_E_Presence_LCC',[LoginController::class,'index']);
Route::post('/loginwebsite',[LoginController::class,'login']);
Route::post('/logoutwebsite',[LoginController::class,'logout']);
Route::put('/profile/ubahpassword/{id}',[ProfileController::class,'ubahpassword']);

Route::middleware(['Admin'])->group(function() {
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/anggotalcc',[AnggotalccController::class,'index']);
    Route::resource('/prodi',ProdiController::class);
    Route::resource('/kelas',KelasController::class);
    Route::resource('/mahasiswa',MahasiswaController::class);
    Route::resource('/kegiatan',KegiatanController::class);
    Route::delete('/deleteall',[MahasiswaController::class,'destroyall'])->name('mahasiswaDeleteAll');
    Route::get('/exportmahasiswa',[MahasiswaController::class,'mahasiswaexport'])->name('exportmahasiswa');
    Route::post('/importmahasiswa',[MahasiswaController::class,'mahasiswaimport'])->name('importmahasiswa');
    Route::put('/update-tingkat', [MahasiswaController::class, 'updateTingkat'])->name('updateTingkat');
    Route::put('/update-status', [KelasController::class, 'updateStatus'])->name('updateStatus');
    Route::put('/update-status-kehadiran', [KehadiranController::class, 'updateStatus'])->name('updateStatusKehadiran');

    Route::delete('/siswa-ids',[MahasiswaController::class,'deleteAll'])->name('siswa_ids.delete');
    Route::resource('/jadwal',JadwalController::class);
    Route::resource('/kehadiran',KehadiranController::class);
    Route::get('/scan',[KehadiranController::class,'scan']);
    Route::get('/getStudentName', [KehadiranController::class, 'getStudentName']);
    Route::get('/kehadiran/{id}/cetak-laporan', [KehadiranController::class, 'cetakLaporan'])->name('kehadiran.cetak-laporan');
    Route::get('/kehadiran/cetak-laporan/{id}', [KehadiranPrintController::class, 'show'])->name('datakehadiran.show');
    Route::resource('/laporan',LaporanController::class);
    Route::get('/printlcc',[LaporanController::class,'printlcc']);
    Route::get('/printmi23a',[LaporanController::class,'printmi23a']);
    Route::get('/profile',[ProfileController::class,'index']);
    Route::get('/profile-edit',[ProfileController::class,'editProfile']);
    Route::put('/profile-update/{id}',[ProfileController::class,'updateProfile']);
    Route::get('/profile/ubahpassword',[ProfileController::class,'indexubahpassword']);
});
