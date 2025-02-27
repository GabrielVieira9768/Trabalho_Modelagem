<x-guest-layout>
    <h1>{{$projeto->nome}}</h1>
    <p>{{$projeto->descricao}}</p>
    <img src="{{ $projeto->imagem ? asset('storage/projetos/' . $projeto->imagem) : asset('storage/projetos/project.png') }}">
    <p>{{App\Models\Ong::find($projeto->ong_id)->nome}}</p>
    <p>{{$projeto->local}}</p>
    <p>{{$projeto->data}}</p>
    <p>{{App\Models\Ong::find($projeto->ong_id)->categoria}}</p>
    <p>{{$projeto->vagas}}</p>
</x-guest-layout>