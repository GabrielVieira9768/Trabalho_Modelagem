<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link para um arquivo CSS externo -->
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
</body>
</html>