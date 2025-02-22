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

// Rotas comuns a todos os usuários
Route::get('/', function () {
    return view('home');
})->name('home'); // View da Página Inicial

Route::get('/homePage', function () {
    return view('auth.home');
})->name('home'); // View da Página Inicial

Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // View de Login

Route::get('/ong/cadastro', function () {
    return view('auth.register-ong');
})->name('ong.cadastro'); // View de Cadastro de Ongs

// Rotas exclusivas do Admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->can('ehAdmin', 'App\Models\User'); // View do Dashboard do Admin

    Route::get('/ongs', [OngController::class, 'index'])->name('ong.index')->can('ehAdmin', 'App\Models\User'); // View que exibe todas as Ongs

    Route::get('/ongs/{ong}/status', [OngController::class, 'alteraStatus'])->name('ong.status')->can('ehAdmin', 'App\Models\User'); // Alterar o status de uma Ong específica
});

// Rotas exclusivas da Ong
Route::middleware('ong')->group(function () {
    Route::get('/ong/dashboard', function () {
        return view('ong.dashboard');
    })->name('ong.dashboard'); // View do Dashboard da Ong

    Route::post('/create', [OngController::class, 'create'])->name('ong.create'); // Salvar a Ong no banco de dados

    Route::delete('/ong/delete', [OngController::class, 'destroy'])->name('ong.destroy'); // Deletar sua própria conta
});

// Rotas exclusivas do Voluntário
Route::middleware('auth')->group(function () {
    Route::get('/voluntario/dashboard', function () {
        return view('voluntario.dashboard');
    })->name('voluntario.dashboard')->can('ehVoluntario', 'App\Models\User'); // View do Dashboard do Voluntário

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->can('ehVoluntario', 'App\Models\User'); // View de Edição de Perfil

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->can('ehVoluntario', 'App\Models\User'); // Atualizar seu perfil

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->can('ehVoluntario', 'App\Models\User'); // Deletar sua própria conta
});

require __DIR__.'/auth.php';
