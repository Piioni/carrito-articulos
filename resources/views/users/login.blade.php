@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="max-w-md mx-auto">
        {{-- Decorative element --}}
        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-br from-fulvous to-accent text-white text-2xl mb-3 shadow-lg">
                🔐
            </div>
            <h1 class="text-2xl font-bold text-thistle">Bienvenido de vuelta</h1>
            <p class="text-thistle/60 text-sm mt-1">Inicia sesión en tu cuenta</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('login')" buttonText="Iniciar Sesión">
                <x-form.input
                        name="email"
                        label="Correo Electrónico"
                        type="email"
                        placeholder="tu@email.com"
                        required
                />

                <x-form.input
                        name="password"
                        label="Contraseña"
                        type="password"
                        placeholder="••••••••"
                        required
                />

                <x-form.checkbox
                        name="remember"
                        label="Recordarme en este dispositivo"
                />
            </x-form.form>

            <div class="divider"></div>

            <p class="text-center text-sm text-charcoal">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="btn-link">
                    Registrarse
                </a>
            </p>
        </x-ui.card>
    </div>
@endsection
