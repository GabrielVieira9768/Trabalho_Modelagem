<!-- resources/views/components/navbar.blade.php -->

<nav class="bg-[#256aa5] p-4 shadow-lg w-full">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo e Nome do Sistema -->
        <div class="flex items-center space-x-3">
            <a href="{{ route('home') }}" class="text-white text-2xl font-bold">VoluntSystem</a>
        </div>

        <!-- Links de Navegação -->
        <div class="space-x-4">
            <a href="{{ route('home') }}" class="text-white hover:text-blue-200 font-semibold">Home</a>
            <a href="{{ route('register') }}" class="text-white hover:text-blue-200 font-semibold">Criar Conta</a>
            <a href="{{ route('login') }}" class="text-white hover:text-blue-200 font-semibold">Login</a>
        </div>
    </div>
</nav>