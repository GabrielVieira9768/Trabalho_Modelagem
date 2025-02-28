<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use App\Models\User;
use App\Models\Ong;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexAdmin()
    {
        $ongs = Ong::all();
        $users = User::all();
        return view('admin.dashboard', compact('ongs', 'users'));
    }

    public function index()
    {
        $inscricoes = Inscricao::where('user_id', auth()->user()->id)->paginate(5);
        return view('voluntario.dashboard', compact('inscricoes'));
    }

    // Realizar iscrição em um projeto
    public function inscrever(String $id)
    {
        Inscricao::create([
            'user_id' => auth()->user()->id,
            'projeto_id' => $id,
        ]);
        return redirect()->route('voluntario.dashboard');
    }

    // Cancelar inscrição em um projeto
    public function cancelarInscricao(String $id)
    {
        $inscricoes = Inscricao::find($id);
        $inscricoes->delete();
        return redirect()->route('voluntario.dashboard');
    }
}
