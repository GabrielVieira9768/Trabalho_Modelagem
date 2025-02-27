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
            <div class="w-full absolute top-0 left-0">
                @include('components.navbar')
            </div>

            <div class="text-center mb-8">
                <div class="flex justify-center gap-0.5"> <!-- gap-0.5 = 2px de separação -->
                    <button
                        onclick="selecionarTipo('ong')"
                        id="btnOng"
                        class="px-6 py-3 bg-[#256aa5] text-white font-semibold rounded-l-lg hover:bg-[#256aa5] transition duration-300">
                        Gerenciar ONG
                    </button>
                    <button
                        onclick="selecionarTipo('voluntario')"
                        id="btnVoluntario"
                        class="px-6 py-3 bg-[#256aa5] text-white font-semibold rounded-r-lg hover:bg-gray-400 transition duration-300">
                        Gerenciar Voluntário
                    </button>
                </div>
            </div>

            <div id="gerenciarOng">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-gray-300"> <!-- Adicionado bg-gray-100 para fundo mais claro -->
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
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Opções</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ongs as $ong)
                                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $ong->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $ong->nome }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ong->categoria }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $ong->status == 1 ? 'Aprovado' : 'Em revisão' }}
                                    </td>                                    
                                    <td class="px-6 py-4 text-right">
                                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300" data-modal-target="aprovar-ong" data-modal-toggle="aprovar-ong">Alterar</button> <!-- Botão azul -->
                                        <form action="{{ route('ong.status', $ong->id) }}" method="POST">
                                            @csrf
                                            <x-modal-container hidden="" idModal="aprovar-ong" title="Alterar Status" accept="Alterar" cancel="Cancelar">
                                                @include('admin.components.ong.aprovar-ong')
                                            </x-modal-container>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="gerenciarVoluntario">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 bg-gray-300"> <!-- Adicionado bg-gray-100 para fundo mais claro -->
                        <thead class="text-xs text-gray-700 uppercase bg-gray-250">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CPF
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $user->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->cpf }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // Função para selecionar o tipo de cadastro
    function selecionarTipo(tipo) {
        // Esconde ambos os formulários
        document.getElementById("gerenciarOng").classList.add("hidden");
        document.getElementById("gerenciarVoluntario").classList.add("hidden");

        // Remove o destaque dos botões
        document.getElementById("btnOng").classList.remove("bg-[#256aa5]", "hover:bg-[#256aa5]");
        document.getElementById("btnVoluntario").classList.remove("bg-[#256aa5]", "hover:bg-[#256aa5]");

        // Define a cor cinza para ambos os botões inicialmente
        document.getElementById("btnOng").classList.add("bg-gray-300", "hover:bg-gray-400");
        document.getElementById("btnVoluntario").classList.add("bg-gray-300", "hover:bg-gray-400");

        // Exibe o formulário correspondente e destaca o botão
        if (tipo === "ong") {
            document.getElementById("gerenciarOng").classList.remove("hidden");
            document.getElementById("btnOng").classList.remove("bg-gray-300", "hover:bg-gray-400");
            document.getElementById("btnOng").classList.add("bg-[#256aa5]", "bg-[#256aa5]");
        } else if (tipo === "voluntario") {
            document.getElementById("gerenciarVoluntario").classList.remove("hidden");
            document.getElementById("btnVoluntario").classList.remove("bg-gray-300", "hover:bg-gray-400");
            document.getElementById("btnVoluntario").classList.add("bg-[#256aa5]", "hover:bg-[#256aa5]");
        }
    }

    // Define o formulário de ONG como padrão ao carregar a página
    window.onload = function() {
        selecionarTipo("ong");
    };
</script>

</html>