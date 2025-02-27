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

    <x-modal-container hidden="false" idModal="delete-equipe-pavimentacao" title="Adicionar Projeto" accept="Criar" cancel="Cancelar">
        @include('ong.components.adicionar')
    </x-modal-container>

</body>

</html>