<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projeto;

class ProjetoController extends Controller
{
    // Retorna todos os projetos em ordem descendente para serem exibidos na view
    public function index()
    {
        $projetos = Projeto::orderBy('created_at', 'desc')->paginate(10);
        return view('projetos.index')->with('projetos', $projetos);
    }

    // Retorna todos os projetos de uma ONG específica em ordem descendente
    public function projetosOng()
    {
        $projetos = Projeto::where('ong_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('projetos.index')->with('projetos', $projetos);
    }

    // Cria um novo projeto
    public function create(Request $request)
    {
        Projeto::create($request->all());
        return view('projetos.create'); // Alterar
    }

    // Atualiza um projeto específico
    public function update(Request $request, String $id)
    {
        $projeto = Projeto::find($id);
        $projeto->update($request->all());
        return redirect()->route('projetos.index');
    }

    // Deleta um projeto específico
    public function destroy(String $id)
    {
        $projeto = Projeto::find($id);
        $projeto->delete();
        return redirect()->route('projetos.index');
    }
}
