<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
        $inscricao = Inscricao::where('user_id', auth()->user()->id)->where('projeto_id', $id)->first();
        $inscricao->delete();
        return redirect()->route('voluntario.dashboard');
    }
}
