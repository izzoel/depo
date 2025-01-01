<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepoController;
use App\Http\Controllers\LandingController;

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
    Route::get('/logout', [DepoController::class, 'logout'])->name('logout');
});
