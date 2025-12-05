<footer class="mt-auto border-t border-accent/20 bg-gradient-to-b from-footer-bg to-cream">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            {{-- Brand --}}
            <div class="flex items-center gap-2">
                <span class="text-xl">🛒</span>
                <span class="text-sm font-semibold text-thistle">Carrito Artículos</span>
            </div>

            {{-- Links --}}
            <ul class="flex flex-wrap justify-center gap-5 text-sm">
                <li>
                    <a href="#" class="text-thistle/70 transition-colors hover:text-fulvous">Privacidad</a>
                </li>
                <li>
                    <a href="#" class="text-thistle/70 transition-colors hover:text-fulvous">Términos</a>
                </li>
                <li>
                    <a href="#" class="text-thistle/70 transition-colors hover:text-fulvous">Contacto</a>
                </li>
            </ul>

            {{-- Copyright --}}
            <p class="text-xs text-thistle/60">&copy; {{ date('Y') }} Carrito Artículos</p>
        </div>
    </div>
</footer>
