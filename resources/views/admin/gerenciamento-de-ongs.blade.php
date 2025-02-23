<!-- resources/views/admin/gerenciamento-de-ongs.blade.php -->

<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Conteúdo da Home -->
    <div class="w-full space-y-12 text-black">
        <h1 class="w-full text-center text-2xl font-bold">Admin</h1>

        <section class="mx-auto min-h-screen w-11/12 space-y-16 sm:space-y-32 lg:w-10/12">
            <div class="flex items-center justify-center">
                <span class="px-8 py-2 bg-[#726E6E] text-white text-xl cursor-default">ONG</span>
                <span class="px-8 py-2 bg-[#BDBDBD] text-white text-xl cursor-default">USUÁRIOS</span>
            </div>
            
            <!-- Barra de pesquisa -->
            <div class="flex justify-start items-center text-black">
                <input 
                    type="text" 
                    class="w-1/3 p-2 border-none rounded-md bg-[#D9D9D9]" 
                    placeholder="Pesquisar" 
                />
            </div>

            <div class="flex flex-col gap-8">
                <!-- @foreach($projects as $project) -->
                <div class="flex flex-col lg:flex-row relative group overflow-hidden rounded-lg">
                    
                    <!-- Imagens -->
                    <img
                        width="600"
                        height="331"
                        sizes="calc(5.81vw + 310px)"
                        src=""
                        alt=""
                        class="object-cover rounded-l-md hidden lg:block"
                    />
                    <img
                        width="600"
                        height="331"
                        sizes="calc(5.81vw + 310px)"
                        src=""
                        alt=""
                        class="object-cover rounded-l-md block lg:hidden w-full max-h-[350px]"
                    />

                    <!-- Conteúdo do projeto -->
                    <section class="w-11/12 mx-auto">
                        <div class="flex flex-col p-6 space-y-3">
                            <section class="flex justify-between items-center gap-2 flex-wrap">
                                <div class="flex items-center gap-1">
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">Nome da ONG</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">|</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">CPNJ</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">|</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">Categoria</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">|</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">Email</h2>
                                </div>
                                <button>
                                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                  </svg>
                                </button>
                            </section>

                            <div class="text-sm text-pretty">Juiz de Fora</div>
                            
                            <div class="text-sm text-pretty line-clamp-4">
                                Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. 
                                Ele tem sido o texto padrão desde o século XVI, quando um impressor desconhecido pegou 
                                uma bandeja de tipos e os embaralhou para fazer um livro de amostras.
                            </div>
                        </div>

                        <!-- Botões / Implementar Lógica -->
                        <div class="flex flex-wrap items-center gap-2 justify-between">
                            <div class="bg-[#39ED4B] px-2 py-1 rounded-md text-sm text-black">Aprovada</div>
                            <div class="flex items-center gap-3">
                                <button class="bg-[#FF586C] px-4 py-2 rounded-md text-sm text-black">Negar</button>
                                <button class="bg-[#39ED4B] px-4 py-2 rounded-md text-sm text-black">Aprovar</button>
                            </div>
                        </div>
                    </section>
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
