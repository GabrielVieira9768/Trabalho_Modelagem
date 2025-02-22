<x-guest-layout>
    <!-- Navbar -->
    <div class="w-full absolute top-0 left-0">
        @include('components.navbar')
    </div>

    <!-- Conteúdo abaixo da navbar com margem superior -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl mt-16"> <!-- mt-16 = 4rem ou 64px -->
        <!-- Título e Botões de Seleção -->
        <div class="text-center mb-8">
            <div class="flex justify-center gap-0.5"> <!-- gap-0.5 = 2px de separação -->
                <button
                    onclick="selecionarTipo('ong')"
                    id="btnOng"
                    class="px-6 py-3 bg-[#256aa5] text-white font-semibold rounded-l-lg hover:bg-[#256aa5] transition duration-300">
                    ONG/Projeto
                </button>
                <button
                    onclick="selecionarTipo('voluntario')"
                    id="btnVoluntario"
                    class="px-6 py-3 bg-[#256aa5] text-white font-semibold rounded-r-lg hover:bg-gray-400 transition duration-300">
                    Voluntário
                </button>
            </div>
        </div>

        <!-- Formulário de Cadastro para ONG -->
        <div id="formOng">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Cadastro ONG/Projeto</h2>
            <form method="POST" action="{{ route('ong.create') }}" class="space-y-6">
                @csrf

                <!-- Nome e CNPJ -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="nome">Nome da ONG/Projeto</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="nome"
                            name="nome"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="cnpj">CNPJ</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="cnpj"
                            name="cnpj"
                            required />
                    </div>
                </div>

                <!-- Categoria e Telefone -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="categoria">Categoria</label>
                        <select
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            id="categoria"
                            name="categoria"
                            required>
                            <option value="Saúde">Saúde</option>
                            <option value="Educação">Educação</option>
                            <option value="Cultura">Cultura</option>
                            <option value="Pesquisa">Pesquisa</option>
                            <option value="Outra">Outra</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="telefone">Telefone</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="tel"
                            id="telefone"
                            name="telefone"
                            required />
                    </div>
                </div>

                <!-- CEP, Estado e Cidade -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="cep">CEP</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="cep"
                            name="cep"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="estado">Estado</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="estado"
                            name="estado"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="cidade">Cidade</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="cidade"
                            name="cidade"
                            required />
                    </div>
                </div>

                <!-- Logradouro e Bairro -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="logradouro">Logradouro</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="logradouro"
                            name="logradouro"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="bairro">Bairro</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="bairro"
                            name="bairro"
                            required />
                    </div>
                </div>

                <!-- Número e Complemento -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="numero">Número</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="numero"
                            name="numero"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="complemento">Complemento</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="complemento"
                            name="complemento" />
                    </div>
                </div>

                <!-- Documento e Logo -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="documento">Documento</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="file"
                            id="documento"
                            name="documento" />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="logo">Logo da ONG/Projeto</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="file"
                            id="logo"
                            name="logo" />
                    </div>
                </div>

                <!-- Email e Senha -->
                <div>
                    <label class="block text-sm font-bold mb-2" for="email">Email</label>
                    <input
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="email"
                        id="email"
                        name="email"
                        required />
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2" for="password">Senha</label>
                    <input
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="password"
                        id="password"
                        name="password"
                        required />
                </div>

                <!-- Descrição -->
                <div>
                    <label class="block text-sm font-bold mb-2" for="descricao">Descrição</label>
                    <textarea
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        id="descricao"
                        name="descricao"
                        rows="4"
                        required
                        placeholder="Digite sua descrição aqui..."></textarea>
                </div>

                <!-- Botão de Envio -->
                <div class="flex justify-center">
                    <button
                        class="bg-[#256aa5] text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
                        type="submit">
                        Criar Conta
                    </button>
                </div>
            </form>
        </div>

        <!-- Formulário de Cadastro para Voluntário -->
        <div id="formVoluntario" class="hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Cadastro Voluntário</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nome e CPF -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="nome">Nome</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="nome"
                            name="nome"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="cpf">CPF</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="cpf"
                            name="cpf"
                            required />
                    </div>
                </div>

                <!-- Data de Nascimento e Telefone -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="data_nascimento">Data de Nascimento</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="date"
                            id="data_nascimento"
                            name="data_nascimento"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="telefone">Telefone</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="tel"
                            id="telefone"
                            name="telefone"
                            required />
                    </div>
                </div>

                <!-- CEP, Estado e Cidade -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="cep">CEP</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="cep"
                            name="cep"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="estado">Estado</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="estado"
                            name="estado"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="cidade">Cidade</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="cidade"
                            name="cidade"
                            required />
                    </div>
                </div>

                <!-- Logradouro e Bairro -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="logradouro">Logradouro</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="logradouro"
                            name="logradouro"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="bairro">Bairro</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="bairro"
                            name="bairro"
                            required />
                    </div>
                </div>

                <!-- Número e Complemento -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold mb-2" for="numero">Número</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="numero"
                            name="numero"
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2" for="complemento">Complemento</label>
                        <input
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="text"
                            id="complemento"
                            name="complemento" />
                    </div>
                </div>

                <!-- Currículo -->
                <div>
                    <label class="block text-sm font-bold mb-2" for="curriculo">Currículo</label>
                    <input
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="file"
                        id="curriculo"
                        name="curriculo" />
                </div>

                <!-- Email e Senha -->
                <div>
                    <label class="block text-sm font-bold mb-2" for="email">Email</label>
                    <input
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="email"
                        id="email"
                        name="email"
                        required />
                </div>
                <div>
                    <label class="block text-sm font-bold mb-2" for="password">Senha</label>
                    <input
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        type="password"
                        id="password"
                        name="password"
                        required />
                </div>

                <!-- Botão de Envio -->
                <div class="flex justify-center">
                    <button
                        class="bg-[#256aa5] hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"
                        type="submit">
                        Criar Conta
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Função para selecionar o tipo de cadastro
        function selecionarTipo(tipo) {
            // Esconde ambos os formulários
            document.getElementById("formOng").classList.add("hidden");
            document.getElementById("formVoluntario").classList.add("hidden");

            // Remove o destaque dos botões
            document.getElementById("btnOng").classList.remove("bg-[#256aa5]", "hover:bg-[#256aa5]");
            document.getElementById("btnVoluntario").classList.remove("bg-[#256aa5]", "hover:bg-[#256aa5]");

            // Define a cor cinza para ambos os botões inicialmente
            document.getElementById("btnOng").classList.add("bg-gray-300", "hover:bg-gray-400");
            document.getElementById("btnVoluntario").classList.add("bg-gray-300", "hover:bg-gray-400");

            // Exibe o formulário correspondente e destaca o botão
            if (tipo === "ong") {
                document.getElementById("formOng").classList.remove("hidden");
                document.getElementById("btnOng").classList.remove("bg-gray-300", "hover:bg-gray-400");
                document.getElementById("btnOng").classList.add("bg-[#256aa5]", "bg-[#256aa5]");
            } else if (tipo === "voluntario") {
                document.getElementById("formVoluntario").classList.remove("hidden");
                document.getElementById("btnVoluntario").classList.remove("bg-gray-300", "hover:bg-gray-400");
                document.getElementById("btnVoluntario").classList.add("bg-[#256aa5]", "hover:bg-[#256aa5]");
            }
        }

        // Define o formulário de ONG como padrão ao carregar a página
        window.onload = function() {
            selecionarTipo("ong");
        };
    </script>
</x-guest-layout>