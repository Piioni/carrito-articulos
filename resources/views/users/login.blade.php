@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="mx-auto max-w-md">
        {{-- Decorative element --}}
        <div class="mb-6 text-center">
            <div
                    class="mb-3 inline-flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br from-fulvous to-accent text-2xl text-white shadow-lg"
            >
                🔐
            </div>
            <h1 class="text-2xl font-bold text-thistle">Bienvenido de vuelta</h1>
            <p class="mt-1 text-sm text-thistle/60">Inicia sesión en tu cuenta</p>
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

                <x-form.input name="password" label="Contraseña" type="password" placeholder="••••••••" required />

                <x-form.checkbox name="remember" label="Recordarme en este dispositivo" />
            </x-form.form>

            <div class="divider"></div>

            <p class="text-center text-sm text-charcoal">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="btn-link">Registrarse</a>
            </p>
        </x-ui.card>
    </div>
@endsection
