<!-- resources/views/admin/gerenciamento-de-usuarios.blade.php -->

<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Conteúdo da Home -->
    <div class="w-full space-y-12">
        <h1 class="w-full text-center text-2xl font-bold">Admin</h1>

        <section class="mx-auto min-h-screen w-11/12 space-y-16 sm:space-y-32 lg:w-10/12">
            <div class="flex items-center justify-center">
                <span class="px-8 py-2 bg-[#BDBDBD] text-white text-xl cursor-default">ONG</span>
                <span class="px-8 py-2 bg-[#726E6E] text-white text-xl cursor-default">USUÁRIOS</span>
            </div>
            
            <!-- Barra de pesquisa -->
            <div class="flex justify-start items-center text-black">
                <input 
                    type="text" 
                    class="w-1/3 p-2 border-none rounded-md bg-[#D9D9D9]" 
                    placeholder="Pesquisar" 
                />
            </div>

            <div class="flex flex-col gap-6">
                <!-- @foreach($projects as $project) -->
                <div class="flex justify-between items-center px-4 py-2 gap-2 overflow-x-auto bg-[#D9D9D9] text-black">
                    <div class="flex items-center gap-4">
                        <span class="text-nowrap">Nome do Usuário</span>
                        <span>|</span>
                        <span class="text-nowrap">Email</span>
                        <span>|</span>
                        <span class="text-nowrap">Telefone</span>
                        <span>|</span>
                        <span class="text-nowrap">Função</span>
                    </div>
                    <button>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
                <!-- @endforeach -->
            </div>
        </section>

                <!-- Botões Paginação -->
                <div class="flex flex-wrap items-center gap-2 justify-center">
            <button class="bg-[#BABABA] px-2 py-1 rounded-md text-sm text-black">
                1
            </button>
            <button class="bg-[#D9D9D9] px-2 py-1 rounded-md text-sm text-black">
                2
            </button>                     
        </div>
    </div>
</x-guest-layout>
