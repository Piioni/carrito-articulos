@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
    <div class="mx-auto max-w-md">
        {{-- Decorative element --}}
        <div class="mb-6 text-center">
            <div
                class="mb-3 inline-flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br from-fulvous to-accent text-2xl text-white shadow-lg"
            >
                👤
            </div>
            <h1 class="text-2xl font-bold text-thistle">Crear Cuenta</h1>
            <p class="mt-1 text-sm text-thistle/60">Únete a nuestra comunidad</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('register')" buttonText="Crear Cuenta">
                <x-form.input name="name" label="Nombre completo" placeholder="Tu nombre" required />

                <x-form.input
                    name="email"
                    label="Correo Electrónico"
                    type="email"
                    placeholder="tu@email.com"
                    required
                />

                <x-form.input name="password" label="Contraseña" type="password" placeholder="••••••••" required />

                <x-form.input
                    name="password_confirmation"
                    label="Confirmar Contraseña"
                    type="password"
                    placeholder="••••••••"
                    required
                />
            </x-form.form>

            <div class="divider"></div>

            <p class="text-center text-sm text-charcoal">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="btn-link">Iniciar Sesión</a>
            </p>
        </x-ui.card>
    </div>
@endsection
