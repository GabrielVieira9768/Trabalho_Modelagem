<!-- resources/views/components/navbar.blade.php -->

<nav class="bg-[#256aa5] p-4 shadow-lg w-full">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo e Nome do Sistema -->
        <div class="flex items-center space-x-3">
            <a href="{{ route('home') }}" class="text-white text-2xl font-bold">VoluntSystem</a>
        </div>

        <!-- Links de Navegação -->
        <div class="space-x-4">
            @if(Route::currentRouteName() === 'ong.dashboard')
                <a href="{{ route('logout') }}" class="text-white hover:text-blue-200 font-semibold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            @else
                <!-- Links para Páginas Públicas -->
                <a href="{{ route('home') }}" class="text-white hover:text-blue-200 font-semibold">Home</a>
                <a href="{{ route('projetos.index') }}" class="text-white hover:text-blue-200 font-semibold">Projetos</a>
                @guest
                    <a href="{{ route('register') }}" class="text-white hover:text-blue-200 font-semibold">Criar Conta</a>
                    <a href="{{ route('login') }}" class="text-white hover:text-blue-200 font-semibold">Entrar</a>
                @endguest

                <!-- Links para Páginas Privadas -->
                @auth
                    @can('ehAdmin', '\App\Models\User')
                        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-blue-200 font-semibold">Dashboard</a>
                    @endcan

                    @can('ehVoluntario', '\App\Models\User')
                        <a href="{{ route('voluntario.dashboard') }}" class="text-white hover:text-blue-200 font-semibold">Dashboard</a>
                    @endcan

                    <a href="{{ route('logout') }}" class="text-white hover:text-blue-200 font-semibold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endauth
            @endif
        </div>
    </div>
</nav>