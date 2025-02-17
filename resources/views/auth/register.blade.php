<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-200 p-8 rounded-lg shadow-lg w-full max-w-3xl">
            <h2 class="text-center text-2xl font-bold mb-4">Criar Conta</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="nome">Nome</label>
                        <input class="w-full p-2 border rounded" type="text" id="nome" name="nome" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="cpf">CPF</label>
                        <input class="w-full p-2 border rounded" type="text" id="cpf" name="cpf" required>
                    </div>
                </div>

                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="nascimento">Data de Nascimento</label>
                        <input class="w-full p-2 border rounded" type="date" id="nascimento" name="nascimento" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="telefone">Telefone</label>
                        <input class="w-full p-2 border rounded" type="tel" id="telefone" name="telefone" required>
                    </div>
                </div>
                
                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="cep">CEP</label>
                        <input class="w-full p-2 border rounded" type="text" id="cep" name="cep" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="endereco">Endereço</label>
                        <input class="w-full p-2 border rounded" type="text" id="endereco" name="endereco" required>
                    </div>
                </div>
                
                <div class="flex space-x-6">
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="numero">Número / Complemento</label>
                        <input class="w-full p-2 border rounded" type="text" id="numero" name="numero" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-bold mb-2" for="curriculo">Currículo</label>
                        <input class="w-full p-2 border rounded" type="file" id="curriculo" name="curriculo">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2" for="email">Email</label>
                    <input class="w-full p-2 border rounded" type="email" id="email" name="email" required>
                </div>
                
                <div>
                    <label class="block text-sm font-bold mb-2" for="password">Senha</label>
                    <input class="w-full p-2 border rounded" type="password" id="password" name="password" required>
                </div>

                <div class="flex items-center justify-center">
                    <button class="bg-cyan-200 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Criar Conta
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>