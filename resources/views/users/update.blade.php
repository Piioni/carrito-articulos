@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
    <div class="max-w-2xl mx-auto">
        <x-ui.back-link :href="route('users.show', $user)" text="Volver al perfil" />

        <div class="text-center mb-6">
            <x-ui.avatar :name="$user->name" size="lg" class="mx-auto mb-3" />
            <h1 class="text-2xl font-bold text-thistle">Editar Perfil</h1>
            <p class="text-thistle/60 text-sm mt-1">Actualiza tu información personal</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('users.update', $user)" method="PUT" buttonText="Guardar Cambios">
                <x-form.input
                    name="name"
                    label="Nombre completo"
                    :value="$user->name"
                    required
                />

                <x-form.input
                    name="email"
                    label="Correo Electrónico"
                    type="email"
                    :value="$user->email"
                    required
                />

                <div class="divider"></div>

                <p class="text-sm text-thistle/70 mb-3 flex items-center gap-1.5">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Deja los campos vacíos si no deseas cambiar la contraseña.
                </p>

                <x-form.input
                    name="password"
                    label="Nueva Contraseña"
                    type="password"
                    placeholder="••••••••"
                />

                <x-form.input
                    name="password_confirmation"
                    label="Confirmar Nueva Contraseña"
                    type="password"
                    placeholder="••••••••"
                />
            </x-form.form>
        </x-ui.card>
    </div>
@endsection
