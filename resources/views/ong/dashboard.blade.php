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

<body>
    <header>
        <h1>Dashboard da Ong</h1>
    </header>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <button data-modal-target="delete-equipe-pavimentacao" data-modal-toggle="delete-equipe-pavimentacao">
        Adicionar
    </button>



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        <span class="sr-only">Opções</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projetos as $projeto)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <x-modal-container hidden="false" idModal="delete-equipe-pavimentacao" title="Adicionar Projeto" accept="Criar" cancel="Cancelar">
        @include('ong.components.adicionar')
    </x-modal-container>

</body>

</html>