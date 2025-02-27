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
            <div class="w-full h-screen absolute top-0 left-0">
                @include('components.navbar')
            </div>

            <h2 class="text-4xl font-bold text-gray-900 mt-30 mb-8 text-center">Projetos Criados</h2>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="text-right">
                    <button data-modal-target="adicionar" data-modal-toggle="adicionar"
                        class="mb-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
                        Adicionar
                    </button>
                </div>

                <form action="{{ route('projetos.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-modal-container hidden="false" idModal="adicionar" title="Adicionar" accept="Criar" cancel="Cancelar">
                        @include('ong.components.adicionar')
                    </x-modal-container>
                </form>
            </div>



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
                                Categoria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Data
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descrição
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Opções</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projetos as $projeto)
                        <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $projeto->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $projeto->nome }}
                            </td>
                            <td class="px-6 py-4">
                                {{ App\Models\Ong::find($projeto->ong_id)->categoria }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $projeto->data }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $projeto->descricao }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300" data-modal-target="editar-projeto-{{$projeto->id}}" data-modal-toggle="editar-projeto-{{$projeto->id}}">Editar</button>
                                <form action="{{ route('projetos.update', $projeto->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <x-modal-container hidden="false" idModal="editar-projeto-{{$projeto->id}}" title="Editar Projeto" accept="Salvar" cancel="Cancelar">
                                        @include('ong.components.editar-projeto')
                                    </x-modal-container>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>