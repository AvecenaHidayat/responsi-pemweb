<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalPemasukan = Transaksi::where('user_id', auth()->id())->where('tipe', 'pemasukan')->sum('jumlah');
    $totalPengeluaran = Transaksi::where('user_id', auth()->id())->where('tipe', 'pengeluaran')->sum('jumlah');

    return view('dashboard', compact('totalPemasukan', 'totalPengeluaran'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('transaksi', TransaksiController::class);
});

require __DIR__.'/auth.php';
