<footer class="from-footer-bg to-cream border-accent/20 mt-auto border-t bg-gradient-to-b">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            {{-- Brand --}}
            <div class="flex items-center gap-2">
                <span class="text-xl">🛒</span>
                <span class="text-thistle text-sm font-semibold">Carrito Artículos</span>
            </div>

            {{-- Links --}}
            <ul class="flex flex-wrap justify-center gap-5 text-sm">
                <li>
                    <a href="#" class="text-thistle/70 hover:text-fulvous transition-colors">Privacidad</a>
                </li>
                <li>
                    <a href="#" class="text-thistle/70 hover:text-fulvous transition-colors">Términos</a>
                </li>
                <li>
                    <a href="#" class="text-thistle/70 hover:text-fulvous transition-colors">Contacto</a>
                </li>
            </ul>

            {{-- Copyright --}}
            <p class="text-thistle/60 text-xs">&copy; {{ date('Y') }} Carrito Artículos</p>
        </div>
    </div>
</footer>
