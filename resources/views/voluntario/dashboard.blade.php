<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link para um arquivo CSS externo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900 antialiased bg-cyan-200">
    <div class="min-h-screen flex items-center justify-center">
        <div class="p-8 rounded-lg w-full max-w-5xl">
            <!-- Navbar ocupando a tela inteira -->
            <div class="w-full h-screen absolute top-0 left-0">
                @include('components.navbar')
            </div>
        
            <h2 class="text-4xl font-bold text-gray-900 mt-30 mb-8 text-center">Projetos Inscritos</h2>
        
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-gray-300">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-250">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Local
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Opções</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscricoes as $inscricao)
                            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $inscricao->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ App\Models\Projeto::find($inscricao->projeto_id)->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ App\Models\Projeto::find($inscricao->projeto_id)->local }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $inscricao->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300" data-modal-target="cancelar-inscricao" data-modal-toggle="cancelar-inscricao">Cancelar Inscrição</button>
                                    <form action="{{ route('cancelar', $inscricao->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <x-modal-container hidden="false" idModal="cancelar-inscricao" title="Editar Projeto" accept="Sim" cancel="Não">
                                            @include('voluntario.components.cancelar-inscricao')
                                        </x-modal-container>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-4">{{$inscricoes->links()}}</div>
        </div>
    </div>
</body>

</html>