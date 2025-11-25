<nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center relative">
    <!-- ESQUERDA -->
    <div>
        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800 hover:text-gray-900">Home</a>
    </div>

    <!-- DIREITA -->
    <div class="flex items-center space-x-6">

        <!-- CARRINHO -->
        <a href="{{ route('cart.index') }}" class="flex items-center space-x-1 hover:text-gray-900">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 001.98-1.75L23 6H6"></path>
            </svg>
            <span class="text-gray-700">Carrinho</span>
        </a>

        <!-- USUÁRIO -->
        @auth
        <div x-data="{ open: false }" class="ml-2 relative">
            <button @click="open = !open" class="flex items-center space-x-1 text-gray-700 font-medium focus:outline-none">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M5.5 21h13a4 4 0 00-13 0z"></path>
                </svg>
                <span>{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 ml-1 transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- BOX DROPDOWN -->
            <div x-show="open" @click.away="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-1"
                 class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-lg z-50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Sair
                    </button>
                </form>
            </div>
        </div>
        @endauth

        <!-- LOGIN -->
        @guest
        <a href="{{ route('login') }}" class="flex items-center space-x-1 hover:text-gray-900">
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
