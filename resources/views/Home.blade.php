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
        <p class="text-xl text-gray-700 mb-10 text-center max-w-4xl leading-relaxed">
            Nosso sistema facilita a gestão de ONGs e voluntários, conectando pessoas a causas que fazem a diferença. 
            Cadastre sua ONG ou torne-se voluntário para transformar vidas!
        </p>

        <!-- Título da seção de projetos -->
        <h2 class="text-4xl font-bold text-gray-900 mt-36 mb-8 text-center">Alguns projetos do nosso sistema</h2>

        <!-- Seção de Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <!-- Card 1 -->
            <div class="bg-[#fff] shadow-lg rounded-lg text-center overflow-hidden">
                <img src="{{ asset('images/project.png') }}" alt="Imagem Card 1" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900">Projeto 1</h3>
                    <p class="text-[#256aa5] mt-2">Encontre oportunidades de voluntariado que combinam com você.</p>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-[#fff] shadow-lg rounded-lg text-center overflow-hidden">
                <img src="{{ asset('images/project.png') }}" alt="Imagem Card 2" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900">Projeto 2</h3>
                    <p class="text-[#256aa5] mt-2">Participe de projetos que fazem a diferença na sociedade.</p>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-[#fff] shadow-lg rounded-lg text-center overflow-hidden">
                <img src="{{ asset('images/project.png') }}" alt="Imagem Card 3" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900">Projeto 3</h3>
                    <p class="text-[#256aa5] mt-2">Ajude a construir um mundo melhor através do voluntariado.</p>
                </div>
            </div>
        </div>

        <!-- Botão Ver Tudo -->
        <div class="mt-12">
            <a href="#" class="bg-blue-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-blue-600 transition">Ver tudo</a>
        </div>
    </div>
</x-guest-layout>