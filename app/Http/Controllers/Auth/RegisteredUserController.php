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
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'max:14', 'unique:users'],
            'data_nascimento' => ['required', 'date'],
            'curriculo' => ['file', 'mimes:pdf,doc,docx', 'max:2048'],
            'endereco.cep' => ['required', 'string'],
            'endereco.estado' => ['required', 'string'],
            'endereco.cidade' => ['required', 'string'],
            'endereco.logradouro' => ['required', 'string'],
            'endereco.bairro' => ['required', 'string'],
            'endereco.numero' => ['required', 'string'],
            'endereco.complemento' => ['nullable', 'string'],
        ]);

        $endereco = Endereco::create([
            'cep' => $request->input('endereco.cep'),
            'estado' => $request->input('endereco.estado'),
            'cidade' => $request->input('endereco.cidade'),
            'logradouro' => $request->input('endereco.logradouro'),
            'bairro' => $request->input('endereco.bairro'),
            'numero' => $request->input('endereco.numero'),
            'complemento' => $request->input('endereco.complemento'),
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
