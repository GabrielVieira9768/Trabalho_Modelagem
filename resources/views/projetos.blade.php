<!-- resources/views/management.blade.php -->

<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <h2 class="text-4xl font-bold text-gray-900 mt-60 mb-8 text-center">Projetos Disponíveis</h2>

    <!-- Seção de Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <!-- Card 1 -->
        @foreach ($projetos as $projeto)
            <div class="bg-[#fff] shadow-lg rounded-lg text-center overflow-hidden">
                <img src="{{ $projeto->imagem ? asset('storage/projetos/' . $projeto->imagem) : asset('storage/projetos/project.png') }}" alt="{{ $projeto->nome }}" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $projeto->nome }}</h3>
                    <p class="text-[#256aa5] mt-2">{{ \Illuminate\Support\Str::limit($projeto->descricao, 100, '...') }}</p>
                    @auth
                        <form action="{{route('inscrever', $projeto->id)}}" method="Post">
                            @csrf
                            <button
                                class="mt-4 bg-[#256aa5] text-white font-semibold py-2 px-6 rounded-lg hover:bg-[#1a4f7a] transition duration-300 ease-in-out transform hover:scale-105">
                                Inscrever
                            </button>
                        </form>
                    @endauth

                    <form action="{{route('projetos.individual', $projeto->id)}}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-4 bg-[#256aa5] text-white font-semibold py-2 px-6 rounded-lg hover:bg-[#1a4f7a] transition duration-300 ease-in-out transform hover:scale-105">
                            Ler mais
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
