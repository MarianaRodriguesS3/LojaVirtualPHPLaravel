<x-guest-layout>
    <!-- Link para voltar à Home -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
            {{ __('Voltar para a página inicial') }}
        </a>
    </div>

    <!-- Área Segura -->
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esta é uma área segura do aplicativo. Por favor, confirme sua senha antes de continuar.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Senha -->
        <div>
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Link Esqueceu a senha -->
        @if (Route::has('password.request'))
            <div class="mt-2 text-sm">
                <a class="underline text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            </div>
        @endif

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirmar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
