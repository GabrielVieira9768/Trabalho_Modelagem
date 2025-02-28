<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngController;
use App\Http\Controllers\UserController;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;
use App\Http\Controllers\ProjetoController;

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

//home 
Route::get('/', [ProjetoController::class, 'home'])->name('home'); // View da Página Inicial

Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // View de Login

Route::post('/create', [OngController::class, 'create'])->name('ong.create'); // Salvar a Ong no banco de dados
Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index'); // View que exibe todos os Projetos
Route::post('/projetos/{projeto}', [ProjetoController::class, 'indexIndividual'])->name('projetos.individual'); // View de um Projeto específico

// Rotas exclusivas do Admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'indexAdmin'])->name('admin.dashboard'); // View do Dashboard do Voluntário

    Route::get('/ongs', [OngController::class, 'index'])->name('ong.index')->can('ehAdmin', 'App\Models\User'); // View que exibe todas as Ongs

    Route::post('/ongs/{ong}/status', [OngController::class, 'alteraStatus'])->name('ong.status')->can('ehAdmin', 'App\Models\User'); // Alterar o status de uma Ong específica
});

// Rotas exclusivas da Ong
Route::middleware('ong')->group(function () {
    Route::put('/ong/update', [OngController::class, 'update'])->name('ong.update'); // Atualizar seu próprio cadastro
    Route::delete('/ong/delete', [OngController::class, 'destroy'])->name('ong.destroy'); // Deletar sua própria conta
    
    Route::post('/ong/cadastro', [OngController::class, 'store'])->name('ong.store'); //Criar uma ong nova
    Route::get('/ong/dashboard', [ProjetoController::class, 'projetosOng'])->name('ong.dashboard'); // Projetos de uma Ong específica
    Route::post('/ong/projetos/create', [ProjetoController::class, 'create'])->name('projetos.create'); // Criar um novo projeto
    Route::put('/ong/projetos/{projeto}', [ProjetoController::class, 'update'])->name('projetos.update'); // Atualizar um projeto
    Route::delete('/ong/projetos/{projeto}', [ProjetoController::class, 'destroy'])->name('projetos.destroy'); // Deletar um projeto
});

// Rotas exclusivas do Voluntário
Route::middleware('auth')->group(function () {
    Route::get('/voluntario/dashboard', [UserController::class, 'index'])->name('voluntario.dashboard'); // View do Dashboard do Voluntário
    
    Route::post('/cadastro', [UserController::class, 'store'])->name('cadastro'); // Criar um voluntario novo
    Route::post('/voluntario/inscrever/{projeto}', [UserController::class, 'inscrever'])->name('inscrever')->can('ehVoluntario', 'App\Models\User'); // Inscrever-se em um projeto
    Route::delete('/voluntario/cancelar/{projeto}', [UserController::class, 'cancelarInscricao'])->name('cancelar')->can('ehVoluntario', 'App\Models\User'); // Cancelar inscrição em um projeto

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->can('ehVoluntario', 'App\Models\User'); // View de Edição de Perfil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->can('ehVoluntario', 'App\Models\User'); // Atualizar seu perfil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->can('ehVoluntario', 'App\Models\User'); // Deletar sua própria conta
});

require __DIR__.'/auth.php';