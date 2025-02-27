<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projeto;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    // Retorna todos os projetos em ordem descendente para serem exibidos na view
    public function index()
    {
        $projetos = Projeto::orderBy('created_at', 'desc')->get();
        return view('projetos', compact('projetos'));
    }

    // Retorna os 3 projetos mais recentes para serem exibidos na home
    public function home()
    {
        $projetos = Projeto::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('projetos'));
    }

    // Retorna todos os projetos de uma ONG específica em ordem descendente
    public function projetosOng()
    {
        $projetos = Projeto::where('ong_id', Auth::guard('ong')->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ong.dashboard', compact('projetos'));
    }

    // Cria um novo projeto
    public function create(Request $request)
    {
        $request['ong_id'] = auth()->user()->id;
        Projeto::create($request->all());
        return view('projetos.create'); // Alterar
    }

    // Atualiza um projeto específico
    public function update(Request $request, String $id)
    {
        $projeto = Projeto::find($id);
        $projeto->update($request->all());
        return redirect()->route('projetos.index'); // Alterar
    }

    // Deleta um projeto específico
    public function destroy(String $id)
    {
        $projeto = Projeto::find($id);
        $projeto->delete();
        return redirect()->route('projetos.index'); // Alterar
    }
}