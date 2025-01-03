<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepoController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MahasiswaController;

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
    Route::get('/logout', [DepoController::class, 'logout'])->name('logout');


    Route::get('/data/mahasiswa/show/{nim}', [MahasiswaController::class, 'show'])->name('mahasiswa_show');
    Route::post('/data/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa_store');
    Route::post('/data/mahasiswa/import', [MahasiswaController::class, 'import'])->name('mahasiswa_import');
    Route::put('/data/mahasiswa/update/{nim}', [MahasiswaController::class, 'update'])->name('mahasiswa_update');
    Route::delete('/data/mahasiswa/destroy/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa_destroy');


    Route::get('/check-inactivity', function () {
        return response()->json(['status' => 'active']);
    })->middleware('inactivity.logout');
});
