<header class="sticky top-0 z-50 border-b border-accent/10 bg-white-smoke/95 shadow-sm backdrop-blur-sm">
    <nav class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ route('articulos.index') }}" class="group flex items-center gap-2">
                <span class="text-2xl">🛒</span>
                <span
                    class="bg-gradient-to-r from-fulvous to-accent bg-clip-text text-xl font-bold text-transparent transition-all duration-300 group-hover:from-accent group-hover:to-fulvous"
                >
                    Carrito
                </span>
            </a>

            {{-- Navigation Links --}}
            <ul class="flex items-center gap-6">
                <li>
                    <a
                        href="{{ route('articulos.index') }}"
                        class="{{ request()->routeIs('articulos.*') ? 'nav-link-active' : 'nav-link' }}"
                    >
                        Artículos
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('sugerencias.index') }}"
                        class="{{ request()->routeIs('sugerencias.*') ? 'nav-link-active' : 'nav-link' }}"
                    >
                        Sugerencias
                    </a>
                </li>

                @auth
                    {{-- User Menu --}}
                    <li class="flex items-center gap-3 border-l border-accent/20 pl-4">
                        <a
                            href="{{ route('users.show', auth()->user()) }}"
                            class="flex items-center gap-2 transition-opacity hover:opacity-80"
                        >
                            <x-ui.avatar :name="auth()->user()->name" size="sm" />
                            <span class="hidden text-sm font-medium text-thistle sm:inline">
                                {{ auth()->user()->name }}
                            </span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <x-ui.button type="submit" variant="ghost" size="sm">Salir</x-ui.button>
                        </form>
                    </li>
                @else
                    <li class="flex items-center gap-3 border-l border-accent/20 pl-4">
                        <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                        <a href="{{ route('login') }}" class="btn-primary">Iniciar Sesión</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
