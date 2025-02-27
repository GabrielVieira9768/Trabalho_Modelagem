<!-- resources/views/home.blade.php -->

<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Conteúdo da Home -->
    <div class="min-h-screen flex flex-col justify-start items-center px-6 max-w-5xl mx-auto pt-20">
        <!-- Logo ajustada -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo do Sistema" class="h-64 w-64 mb-8">

        <!-- Título -->
        <h1 class="text-5xl font-extrabold text-gray-900 mb-12 text-center">
            Bem-vindo ao Sistema VoluntSystem
        </h1>

        <!-- Descrição do Projeto -->
        <p class="text-xl text-gray-700 mb-20 text-center max-w-4xl leading-relaxed">
            Nosso sistema facilita a gestão de ONGs e voluntários, conectando pessoas a causas que fazem a diferença.
            Cadastre sua ONG ou torne-se voluntário para transformar vidas!
        </p>

        <!-- Título da seção de projetos -->
        <h2 class="text-4xl font-bold text-gray-900 mt-26 mb-8 text-center">Alguns projetos do nosso sistema</h2>

        <!-- Seção de Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            @foreach ($projetos as $projeto)
            <!-- Card 1 -->
            <div class="bg-[#fff] shadow-lg rounded-lg text-center overflow-hidden">
                <img src="{{ $projeto->imagem ? asset('storage/projetos/' . $projeto->imagem) : asset('storage/projetos/project.png') }}" alt="{{ $projeto->nome }}" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $projeto->nome }}</h3>
                    <p class="text-[#256aa5] mt-2">{{ \Illuminate\Support\Str::limit($projeto->descricao, 100, '...') }}</p>
                </div>
                <form action="{{route('projetos.individual', $projeto->id)}}" method="POST">
                    @csrf
                    <button type="submit"
                        class="mt-4 bg-[#256aa5] text-white font-semibold py-2 px-6 rounded-lg hover:bg-[#1a4f7a] transition duration-300 ease-in-out transform hover:scale-105">
                        Ler mais
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        <!-- Botão Ver Tudo -->
        <div class="mt-12 mb-20">
            <a href="{{ route('projetos.index') }}" class="bg-blue-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-600 transition">Mais Projetos</a>
        </div>
    </div>

    <!-- Footer -->
    
</x-guest-layout>