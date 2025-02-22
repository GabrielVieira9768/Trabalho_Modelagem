<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngController;

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

// Rota da tela de Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas exclusivas da Ong
Route::middleware('ong')->group(function () {
    Route::get('/ong/dashboard', function () {
        echo 'Dashboard da Ong';
    })->name('ong.dashboard');
});

// Rotas da Ong
Route::get('/ong/cadastro', function () {
    return view('auth.register-ong');
})->name('ong.cadastro');
Route::post('/create', [OngController::class, 'create'])->name('ong.create');
Route::get('/ong', [OngController::class, 'index'])->name('ong.index');

require __DIR__.'/auth.php';
