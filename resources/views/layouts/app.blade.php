<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 relative">

    <!-- Inclui a navbar -->
    @include('partials.navigation')

    <!-- Mensagem global -->
    @auth
    <div class="fixed top-4 left-1/2 -translate-x-1/2 z-50">
        @php
            $message = session('success') ?? (session('welcome') ? "Bem-vindo(a), " . Auth::user()->name . "!" : null);
        @endphp
        @if($message)
        <span x-data="{ show: true }" x-init="setTimeout(() => show=false, 3000)" x-show="show"
            class="bg-green-500 text-white text-lg px-4 py-1 rounded shadow-lg transition">
            {{ $message }}
        </span>

        @php
        session()->forget('success');
        session()->forget('welcome');
        @endphp
        @endif
    </div>
    @endauth

    <!-- Conteúdo principal -->
    <div class="max-w-7xl mx-auto p-8">
        {{ $slot ?? '' }}
    </div>

</body>

</html>