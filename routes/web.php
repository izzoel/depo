<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepoController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PersediaanController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\LokasiController;

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

Route::any('/', [LandingController::class, 'landing'])->name('landing');
Route::any('/login', [LandingController::class, 'login'])->name('login');
Route::any('/logbook', [LandingController::class, 'logbook'])->name('logbook');

Route::middleware(['auth.or.mahasiswa'])->group(function () {
    Route::get('/depo', [DepoController::class, 'index'])->name('depo');
    Route::get('/data/alat', [DepoController::class, 'alat'])->name('alat');
    Route::get('/data/cair', [DepoController::class, 'cair'])->name('cair');
    Route::get('/data/kerusakan', [DepoController::class, 'kerusakan'])->name('kerusakan');
    Route::get('/data/mahasiswa', [DepoController::class, 'mahasiswa'])->name('mahasiswa');
    Route::get('/data/padat', [DepoController::class, 'padat'])->name('padat');
    Route::get('/setting/lokasi', [DepoController::class, 'lokasi'])->name('lokasi');
    Route::get('/setting/laboratorium', [DepoController::class, 'laboratorium'])->name('laboratorium');
    Route::get('/setting/satuan', [DepoController::class, 'satuan'])->name('satuan');
    Route::get('/logout', [DepoController::class, 'logout'])->name('logout');

    Route::get('/data/mahasiswa/show/{nim}', [MahasiswaController::class, 'show'])->name('mahasiswa_show');
    Route::post('/data/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa_store');
    Route::post('/data/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa_import');
    Route::put('/data/mahasiswa/update/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa_update');
    Route::delete('/data/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa_destroy');

    Route::get('/data/kerusakan/show/{id}', [KerusakanController::class, 'show'])->name('kerusakan_show');
    Route::post('/data/kerusakan/store', [KerusakanController::class, 'store'])->name('kerusakan_store');
    Route::put('/data/kerusakan/update/{id}', [KerusakanController::class, 'update'])->name('kerusakan_update');
    Route::delete('/data/kerusakan/destroy/{id}', [KerusakanController::class, 'destroy'])->name('kerusakan_destroy');

    Route::get('/data/alat/show/{id}', [PersediaanController::class, 'show'])->name('alat_show');
    Route::post('/data/alat/store', [PersediaanController::class, 'store'])->name('alat_store');
    Route::post('/data/alat/import', [PersediaanController::class, 'import'])->name('persediaan_import');
    Route::put('/data/alat/update/{id}', [PersediaanController::class, 'update'])->name('alat_update');
    Route::delete('/data/alat/destroy/{id}', [PersediaanController::class, 'destroy'])->name('alat_destroy');

    Route::get('/data/cair/show/{id}', [PersediaanController::class, 'show'])->name('cair_show');
    Route::post('/data/cair/store', [PersediaanController::class, 'store'])->name('cair_store');
    Route::post('/data/cair/import', [PersediaanController::class, 'import'])->name('persediaan_import');
    Route::put('/data/cair/update/{id}', [PersediaanController::class, 'update'])->name('cair_update');
    Route::delete('/data/cair/destroy/{id}', [PersediaanController::class, 'destroy'])->name('cair_destroy');

    Route::get('/data/padat/show/{id}', [PersediaanController::class, 'show'])->name('padat_show');
    Route::post('/data/padat/store', [PersediaanController::class, 'store'])->name('padat_store');
    Route::post('/data/padat/import', [PersediaanController::class, 'import'])->name('persediaan_import');
    Route::put('/data/padat/update/{id}', [PersediaanController::class, 'update'])->name('padat_update');
    Route::delete('/data/padat/destroy/{id}', [PersediaanController::class, 'destroy'])->name('padat_destroy');

    Route::get('/setting/laboratorium/all', [LaboratoriumController::class, 'index']);
    Route::get('/setting/laboratorium/show/{id}', [LaboratoriumController::class, 'show'])->name('laboratorium_show');
    Route::post('/setting/laboratorium/store', [LaboratoriumController::class, 'store'])->name('laboratorium_store');
    Route::put('/setting/laboratorium/update/{id}', [LaboratoriumController::class, 'update'])->name('laboratorium_update');
    Route::delete('/setting/laboratorium/destroy/{id}', [LaboratoriumController::class, 'destroy'])->name('laboratorium_destroy');

    Route::get('/setting/lokasi/all', [LokasiController::class, 'index']);
    Route::get('/setting/lokasi/show/{id}', [LokasiController::class, 'show'])->name('lokasi_show');
    Route::post('/setting/lokasi/store', [LokasiController::class, 'store'])->name('lokasi_store');
    Route::put('/setting/lokasi/update/{id}', [LokasiController::class, 'update'])->name('lokasi_update');
    Route::delete('/setting/lokasi/destroy/{id}', [LokasiController::class, 'destroy'])->name('lokasi_destroy');

    Route::get('/setting/satuan/all', [SatuanController::class, 'index']);
    Route::get('/setting/satuan/show/{id}', [SatuanController::class, 'show'])->name('satuan_show');
    Route::post('/setting/satuan/store', [SatuanController::class, 'store'])->name('satuan_store');
    Route::put('/setting/satuan/update/{id}', [SatuanController::class, 'update'])->name('satuan_update');
    Route::delete('/setting/satuan/destroy/{id}', [SatuanController::class, 'destroy'])->name('satuan_destroy');

    Route::get('/setting/profil/{role}/{id?}', [MahasiswaController::class, 'profil'])->name('profil');
    Route::get('/setting/profil/biodata', [MahasiswaController::class, 'biodata'])->name('biodata');
    Route::get('/setting/profil/password/{role}/{id?}', [MahasiswaController::class, 'password'])->name('password');

    Route::get('/afk', function () {
        return response()->json(['status' => 'active']);
    })->middleware('inactivity.logout');
});
