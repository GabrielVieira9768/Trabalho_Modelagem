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
                        <label class="block text-lg font-bold mb-3" for="cnpj">CNPJ</label>
                        <input class="w-full p-3 border rounded" type="text" id="cnpj" name="cnpj" required>
                    </div>
                </div>

                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="categoria">Categoria</label>
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
                        <label class="block text-lg font-bold mb-3" for="estado">Estado</label>
                        <input class="w-full p-3 border rounded" type="text" id="estado" name="estado" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="cidade">Cidade</label>
                        <input class="w-full p-3 border rounded" type="text" id="cidade" name="cidade" required>
                    </div>
                </div>
                
                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="logradouro">Logradouro</label>
                        <input class="w-full p-3 border rounded" type="text" id="logradouro" name="logradouro" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="bairro">Bairro</label>
                        <input class="w-full p-3 border rounded" type="text" id="bairro" name="bairro" required>
                    </div>
                </div>

                <div class="flex space-x-8">
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="numero">Número</label>
                        <input class="w-full p-3 border rounded" type="text" id="numero" name="numero" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-lg font-bold mb-3" for="complemento">Complemento</label>
                        <input class="w-full p-3 border rounded" type="text" id="complemento" name="complemento">
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