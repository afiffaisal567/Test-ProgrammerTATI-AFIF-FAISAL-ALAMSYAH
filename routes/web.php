<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    Route::get('/logs/create', [LogController::class, 'create'])->name('logs.create');
    Route::post('/logs', [LogController::class, 'store'])->name('logs.store');
    Route::get('/logs/verify', [LogController::class, 'verify'])->name('logs.verify');
    Route::post('/logs/{log}/update-status', [LogController::class, 'updateStatus'])->name('logs.updateStatus');
});

Route::get('/helloworld', function () {
    $n = request('n');

    $output = null;

    if ($n && is_numeric($n) && $n > 0) {
        $result = [];

        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 === 0 && $i % 5 === 0) {
                $result[] = 'helloworld';
            } elseif ($i % 4 === 0) {
                $result[] = 'hello';
            } elseif ($i % 5 === 0) {
                $result[] = 'world';
            } else {
                $result[] = $i;
            }
        }

        $output = implode(' ', $result);
    }

    return view('helloworld', compact('output'));
})->name('helloworld');

Route::get('/uji-predikat', function () {
    $hasil_kerja = request('hasil_kerja') ?? 'sesuai ekspektasi';
    $perilaku = request('perilaku') ?? 'di atas ekspektasi';

    $predikat = predikat_kinerja($hasil_kerja, $perilaku);

    return view('predikat', compact('hasil_kerja', 'perilaku', 'predikat'));
});

require __DIR__.'/auth.php';
