<!-- resources/views/projects.blade.php -->

<x-guest-layout>
    <!-- Navbar ocupando a tela inteira -->
    <div class="w-full h-screen absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Conteúdo da Home -->
    <div class="w-full space-y-12 text-black">
        <h1 class="w-full text-center text-2xl font-bold">Todos os Projetos</h1>
        <section class="mx-auto min-h-screen w-11/12 space-y-16 sm:space-y-32 lg:w-10/12">

            <!-- Barra de pesquisa -->
            <div class="flex justify-start items-center">
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
                            <section class="flex justify-between items-center gap-2">
                                <div class="flex items-center gap-1">
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">
                                        Projeto ONG 1
                                    </h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">|</h2>
                                    <h2 class="text-2xl font-semibold leading-none tracking-tight">
                                        Nome da ONG
                                    </h2>
                                </div>
                                <div class="flex max-h-[30px] min-w-fit text-center text-white text-sm font-semibold">
                                    01/01/2001
                                </div>
                            </section>

                            <div class="text-sm text-pretty">
                                Juiz de Fora
                            </div>

                            <div class="text-sm text-pretty line-clamp-4">
                                Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. 
                                Ele tem sido o texto padrão desde o século XVI, quando um impressor desconhecido pegou 
                                uma bandeja de tipos e os embaralhou para fazer um livro de amostras.
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="flex flex-wrap items-center gap-2 justify-between">
                            <div class="bg-[#ECEAEA] px-2 py-1 rounded-md text-sm text-black">
                                1 Vaga Restante
                            </div>
                            <button class="bg-[#18CF2A] px-4 py-2 rounded-md text-sm text-black">
                                Candidatar-se
                            </button>
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
