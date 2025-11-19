<x-guest-layout>
    <!-- Link para voltar à Home -->
    <div class="mb-4">
        <a href="{{ route('home') }}" class="text-sm text-gray-600 underline hover:text-gray-900">
            {{ __('Voltar para a página inicial') }}
        </a>
    </div>

    <!-- Instruções de redefinição de senha -->
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esqueceu sua senha? Sem problemas. Informe seu endereço de e-mail e enviaremos um link para redefinição de senha, permitindo que você escolha uma nova.') }}
    </div>

    <!-- Status da Sessão -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Endereço de Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enviar link de redefinição de senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
