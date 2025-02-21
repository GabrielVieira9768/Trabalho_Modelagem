<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Endereco;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validação de dados
        

        $endereco = Endereco::create([
            'cep' => $request->cep,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
        ]);

        // Criar o usuário e associar o endereço
        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'endereco_id' => $endereco->id,
        ]);

        // Salvar currículo, se houver
        if ($request->hasFile('curriculo')) {
            $user->curriculo = $request->file('curriculo')->store('curriculos', 'public');
            $user->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}