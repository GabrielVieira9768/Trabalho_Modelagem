<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projeto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    // Retorna todos os projetos em ordem descendente para serem exibidos na view
    public function index()
    {
        $projetos = Projeto::orderBy('created_at', 'desc')->get();
        return view('projetos', compact('projetos'));
    }

    // Retorna um projeto específico para ser exibido na view
    public function indexIndividual(String $id)
    {
        $projeto = Projeto::find($id);
        return view('projeto-individual', compact('projeto'));
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
        $request->validate([
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validação da imagem
        ]);

        $dados = $request->all();
        $dados['ong_id'] = Auth::guard('ong')->user()->id;

        // Verifica se há um arquivo de imagem
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName(); // Gera um nome único
            $caminho = $imagem->storeAs('public/projetos', $nomeImagem); // Salva a imagem

            $dados['imagem'] = $nomeImagem; // Salva o nome no banco
        }

        Projeto::create($dados);
        return redirect()->route('ong.dashboard'); // Alterar se necessário
    }

    // Atualiza um projeto específico
    public function update(Request $request, String $id)
    {
        $projeto = Projeto::find($id);
        
        if (!$projeto) {
            return redirect()->route('ong.dashboard')->with('error', 'Projeto não encontrado');
        }
        
        $request->validate([
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $dados = $request->all();
        
        // Verifica se há um novo arquivo de imagem
        if ($request->hasFile('imagem')) {
            // Remove a imagem antiga, se existir e não for 'project.png'
            if ($projeto->imagem && $projeto->imagem !== 'project.png') {
                Storage::delete('public/projetos/' . $projeto->imagem);
            }
            
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName();
            $caminho = $imagem->storeAs('public/projetos', $nomeImagem);
            
            $dados['imagem'] = $nomeImagem;
        }
        
        $projeto->update($dados);
        
        return redirect()->route('ong.dashboard')->with('success', 'Projeto atualizado com sucesso');
    }


    // Deleta um projeto específico
    public function destroy(String $id)
    {
        $projeto = Projeto::find($id);
        $projeto->delete();
        return redirect()->route('ong.dashboard'); // Alterar
    }
}