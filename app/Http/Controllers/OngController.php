<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ong;
use Illuminate\Http\Request;
use App\Models\Endereco;

class OngController extends Controller
{
    // Retorna todas as ONGs em ordem descendente para serem exibidadas na view
    public function index()
    {
        $ongs = Ong::orderBy('created_at', 'desc')->paginate(10);
        return view ('ongs.index', compact('ongs'))->with('paginate', true);
    }

    // Cadastra uma nova ONG
    public function create(Request $request)
    {
        // Valida os dados antes de criar os registros
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:ongs,email',
            'password' => 'required|string|min:8|confirmed',
            'cnpj' => 'required|string|max:18|unique:ongs,cnpj',
            'telefone' => 'nullable|string|max:15',
            'categoria' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
            'logo' => 'nullable|string',
            'documento' => 'nullable|string',
            'rua' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'cep' => 'required|string|max:9',
        ]);
    
        // Criar endereço primeiro
        $endereco = Endereco::create([
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'cep' => $request->cep,
        ]);
    
        if (!$endereco) {
            return back()->withErrors(['error' => 'Falha ao salvar endereço']);
        }
    
        // Criar ONG com a referência do endereço
        $ong = Ong::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash da senha
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
            'logo' => $request->logo,
            'documento' => $request->documento,
            'status' => 1, // Ativando por padrão
            'endereco_id' => $endereco->id,
        ]);
    
        if (!$ong) {
            return back()->withErrors(['error' => 'Falha ao salvar ONG']);
        }
    
        // Redireciona para a página de login com a mensagem de sucesso
        session()->flash('success', 'ONG cadastrada com sucesso! Agora, faça login para continuar.');
        return redirect()->route('login');
    }


    
    // Atualiza cadastro
    public function update(Request $request)
    {
        $ong = Ong::find(auth()->user()->id);
        $endereco = Endereco::find($ong->endereco_id);
        $ong->update($request->all());
        $endereco->update($request->all());
        return redirect()->route('ongs.index'); // Alterar
    }

    // Deleta a própria ONG
    public function destroy()
    {
        $ong = Ong::find(auth()->user()->id);
        $ong->delete();
        return redirect()->route('login');
    }

    // Alterar o status do cadastro de uma ONG específica
    public function alteraStatus(String $id)
    {
        $ong = Ong::find($id);

        if($ong->status == 1) {
            $ong->update(['status' => 0]);
        } else {
            $ong->update(['status' => 1]);
        }

        return redirect()->route('ongs.index');
    }
}