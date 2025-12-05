<footer class="bg-gradient-to-b from-footer-bg to-cream mt-auto border-t border-accent/20">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            {{-- Brand --}}
            <div class="flex items-center gap-2">
                <span class="text-xl">🛒</span>
                <span class="font-semibold text-thistle text-sm">Carrito Artículos</span>
            </div>

            {{-- Links --}}
            <ul class="flex flex-wrap justify-center gap-5 text-sm">
                <li>
                    <a href="#" class="text-thistle/70 hover:text-fulvous transition-colors">
                        Privacidad
                    </a>
                </li>
                <li>
                    <a href="#" class="text-thistle/70 hover:text-fulvous transition-colors">
                        Términos
                    </a>
                </li>
                <li>
                    <a href="#" class="text-thistle/70 hover:text-fulvous transition-colors">
                        Contacto
                    </a>
                </li>
            </ul>

            {{-- Copyright --}}
            <p class="text-xs text-thistle/60">
                &copy; {{ date('Y') }} Carrito Artículos
            </p>
        </div>
    </div>
</footer>