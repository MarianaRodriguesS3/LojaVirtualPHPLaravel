<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Tênis</title>

    <!-- Tailwind (se usa Breeze, já funciona) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine para animação do "Bem-vindo" -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="bg-gray-100">

    <!-- NAV BAR -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">

        <!-- ESQUERDA -->
        <div>
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800 hover:text-gray-900">
                Home
            </a>
        </div>

        <!-- DIREITA -->
        <div class="flex items-center space-x-6">

            <!-- CARRINHO -->
            <div class="flex items-center space-x-1 relative">

                <a href="{{ route('cart.index') }}" class="flex items-center space-x-1 hover:text-gray-900">
                    <!-- Ícone do carrinho -->
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 001.98-1.75L23 6H6"></path>
                    </svg>
                    <span class="text-gray-700">Carrinho</span>
                </a>

                <!-- MENSAGEM "BEM-VINDO" por 3 segundos -->
                @auth
                    <span x-data="{ show: true }"
                          x-init="setTimeout(() => show = false, 3000)"
                          x-show="show"
                          class="absolute -top-6 right-0 bg-green-500 text-white text-xs px-2 py-1 rounded shadow">
                        Bem-vindo, {{ Auth::user()->name }}
                    </span>

                    <!-- Nome do usuário (surge depois dos 3s automaticamente) -->
                    <span x-data="{ show: false }"
                          x-init="setTimeout(() => show = true, 3000)"
                          x-show="show"
                          class="ml-1 text-gray-700 font-medium">
                        {{ Auth::user()->name }}
                    </span>
                @endauth
            </div>

            <!-- LOGIN -->
            @guest
                <a href="{{ route('login') }}" class="flex items-center space-x-1 hover:text-gray-900">
                    <!-- Ícone login -->
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <path d="M20 8v6M23 11h-6"></path>
                    </svg>

                    <span class="text-gray-700">Fazer login</span>
                </a>
            @endguest

        </div>
    </nav>

    <!-- CONTEÚDO PRINCIPAL -->
    <div class="max-w-7xl mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Bem-vindo à nossa loja virtual!</h1>
        <p class="text-gray-600">Explore nossos produtos incríveis.</p>
    </div>

</body>
</html>
