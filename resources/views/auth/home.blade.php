<!-- resources/views/home.blade.php -->

<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Conteúdo da Home -->
    <div class="min-h-screen flex flex-col justify-center items-center px-6 max-w-5xl mx-auto">
        <!-- Logo centralizada e maior -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo do Sistema" class="h-80 w-80 mb-10">

        <!-- Título -->
        <h1 class="text-6xl font-extrabold text-gray-900 mb-6 text-center">
            Bem-vindo ao Sistema VoluntSystem
        </h1>

        <!-- Descrição do Projeto -->
        <p class="text-xl text-gray-700 mb-10 text-center max-w-4xl leading-relaxed">
            Nosso sistema facilita a gestão de ONGs e voluntários, conectando pessoas a causas que fazem a diferença. 
            Cadastre sua ONG ou torne-se voluntário para transformar vidas!
        </p>
    </div>
</x-guest-layout>
