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
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                1
                            </th>
                            <td class="px-6 py-4">
                                Projeto Nome
                            </td>
                            <td class="px-6 py-4">
                                Juiz de Fora
                            </td>
                            <td class="px-6 py-4">
                                22/10/25
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button data-modal-target="cancelar-inscricao" data-modal-toggle="cancelar-inscricao">Cancelar Inscrição</button>
                                <form>
                                    @csrf
                                    <x-modal-container hidden="false" idModal="cancelar-inscricao" title="Editar Projeto" accept="Sim" cancel="Não">
                                        @include('voluntario.components.cancelar-inscricao')
                                    </x-modal-container>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>