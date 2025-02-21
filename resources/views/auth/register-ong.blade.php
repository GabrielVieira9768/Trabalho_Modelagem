<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-200 p-12 rounded-lg shadow-lg w-full max-w-7xl"> <!-- Largura aumentada -->
            <h2 class="text-center text-3xl font-bold mb-6">Criar Conta</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-8">
                @csrf
                
                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="nome">Nome da ONG/Projeto</label>
                        <input class="w-full p-3 border rounded" type="text" id="nome" name="nome" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="cpf">CNPJ</label>
                        <input class="w-full p-3 border rounded" type="text" id="cnpj" name="cpf" required>
                    </div>
                </div>

                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="nascimento">Categoria</label>
                        <select class="w-full p-3 border rounded" id="categoria" name="categoria">
                            <option value="opcao1">Saúde</option>
                            <option value="opcao2">Educação</option>
                            <option value="opcao3">Cultura</option>
                            <option value="opcao4">Pesquisa</option>
                            <option value="opcao5">Outra</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="telefone">Telefone</label>
                        <input class="w-full p-3 border rounded" type="tel" id="telefone" name="telefone" required>
                    </div>
                </div>
                
                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="cep">CEP</label>
                        <input class="w-full p-3 border rounded" type="text" id="cep" name="cep" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="endereco">Estado</label>
                        <input class="w-full p-3 border rounded" type="text" id="endereco" name="endereco" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="endereco">Cidade</label>
                        <input class="w-full p-3 border rounded" type="text" id="endereco" name="endereco" required>
                    </div>
                </div>
                
                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="endereco">Logradouro</label>
                        <input class="w-full p-3 border rounded" type="text" id="endereco" name="endereco" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="endereco">Bairro</label>
                        <input class="w-full p-3 border rounded" type="text" id="endereco" name="endereco" required>
                    </div>
                </div>

                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="numero">Número</label>
                        <input class="w-full p-3 border rounded" type="text" id="numero" name="numero" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="endereco">Complemento</label>
                        <input class="w-full p-3 border rounded" type="text" id="endereco" name="endereco" required>
                    </div>
                </div>

                
                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="documento">Documento</label>
                        <input class="w-full p-3 border rounded" type="file" id="documento" name="documento">
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="logo">Logo da ONG/Projeto</label>
                        <input class="w-full p-3 border rounded" type="file" id="logo" name="logo">
                    </div>
                </div>
                
                <div>
                    <label class="block text-lg font-bold mb-3" for="email">Email</label>
                    <input class="w-full p-3 border rounded" type="email" id="email" name="email" required>
                </div>
                
                <div>
                    <label class="block text-lg font-bold mb-3" for="password">Senha</label>
                    <input class="w-full p-3 border rounded" type="password" id="password" name="password" required>
                </div>

                <div>
                    <label class="block text-lg font-bold mb-3" for="descricao">Descrição</label>
                    <textarea
                        class="w-full p-3 border rounded h-32 resize-y"
                        id="descricao"
                        name="descricao"
                        required
                        placeholder="Digite sua descrição aqui..."
                    ></textarea>
                </div>

                <div class="flex items-center justify-center">
                    <button class="bg-cyan-200 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Criar Conta
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>