<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-100 p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">LOGIN</h2>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="email@gmail.com" required autofocus autocomplete="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Senha -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                    <input id="password" name="password" type="password" placeholder="senha" required autocomplete="current-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Botão Entrar -->
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-cyan-200 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Entrar
                    </button>
                </div>

                <!-- Esqueceu a senha -->
                <div class="flex items-center justify-center">
                    @if (Route::has('password.request'))
                        <p class="text-center mt-4">
                            <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                                Esqueceu a senha?
                            </a>
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>