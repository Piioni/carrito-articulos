@extends('layouts.app')

@section('title', 'Registrarse')

@section('content')
    <div class="mx-auto max-w-md">
        {{-- Decorative element --}}
        <div class="mb-6 text-center">
            <div
                class="from-fulvous to-accent mb-3 inline-flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br text-2xl text-white shadow-lg"
            >
                👤
            </div>
            <h1 class="text-thistle text-2xl font-bold">Crear Cuenta</h1>
            <p class="text-thistle/60 mt-1 text-sm">Únete a nuestra comunidad</p>
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

            <p class="text-charcoal text-center text-sm">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="btn-link">Iniciar Sesión</a>
            </p>
        </x-ui.card>
    </div>
@endsection
