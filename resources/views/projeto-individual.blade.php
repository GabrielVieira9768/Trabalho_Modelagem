<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Container principal -->
    <div class="max-w-4xl mx-auto mt-30 px-4 py-8 relative"> <!-- Adicionei relative para posicionar o ícone -->
        <!-- Ícone de seta para voltar -->
        <a href="{{ route('projetos.index') }}" class="absolute top-12 -left-14 flex items-center text-white transition duration-300">
            <div class="p-2 bg-[#256aa5] rounded-full hover:bg-gray-400 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </div>
        </a>

        <!-- Título do projeto -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <h1 class="text-4xl font-bold text-gray-900 mb-8 text-center">{{ $projeto->nome }}</h1>

                <div class="mb-8">
                    <img src="{{ $projeto->imagem ? asset('storage/projetos/' . $projeto->imagem) : asset('storage/projetos/project.png') }}"
                        alt="{{ $projeto->nome }}"
                        class="w-full h-96 object-cover rounded-lg shadow-lg">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Descrição do Projeto</p>
                    <p class="text-lg text-gray-700 mb-8">{{ $projeto->descricao }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- ONG responsável -->
                <div>
                    <p class="text-sm text-gray-500">ONG Responsável</p>
                    <p class="text-lg font-semibold text-gray-900">{{ App\Models\Ong::find($projeto->ong_id)->nome }}</p>
                </div>

                <!-- Local do projeto -->
                <div>
                    <p class="text-sm text-gray-500">Local</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $projeto->local }}</p>
                </div>

                <!-- Data do projeto -->
                <div>
                    <p class="text-sm text-gray-500">Data</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $projeto->data }}</p>
                </div>

                <!-- Categoria do projeto -->
                <div>
                    <p class="text-sm text-gray-500">Categoria</p>
                    <p class="text-lg font-semibold text-gray-900">{{ App\Models\Ong::find($projeto->ong_id)->categoria }}</p>
                </div>

                <!-- Vagas disponíveis -->
                <div>
                    <p class="text-sm text-gray-500">Vagas Disponíveis</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $projeto->vagas }}</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>