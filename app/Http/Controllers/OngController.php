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
        $endereco = Endereco::create($request->all());
        $request['endereco_id'] = $endereco->id;
        Ong::create($request->all());
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