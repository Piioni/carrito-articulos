<header class="bg-white-smoke shadow-md">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-fulvous">Mi App</a>
            <ul class="flex space-x-6 items-center">
                @auth
                    <li><a href="{{ route('') }}" class="text-thistle font-semibold hover:opacity-80 transition-opacity">Perfil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <x-ui.button type="submit">Salir</x-ui.button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="bg-fulvous hover:bg-accent text-white px-4 py-2 rounded font-semibold inline-block transition-colors duration-300">Login</a></li>
                @endauth
            </ul>
        </div>
    </nav>
</header>