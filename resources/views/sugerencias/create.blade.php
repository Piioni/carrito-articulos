@extends('layouts.app')

@section('title', 'Nueva Sugerencia')

@section('content')
    <div class="mx-auto max-w-2xl">
        <x-ui.back-link :href="route('sugerencias.index')" text="Volver a sugerencias" />

        <div class="mb-6 text-center">
            <div
                class="mb-3 inline-flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br from-fulvous to-accent text-2xl text-white shadow-lg"
            >
                💡
            </div>
            <h1 class="text-2xl font-bold text-thistle">Nueva Sugerencia</h1>
            <p class="mt-1 text-sm text-thistle/60">¿Qué producto te gustaría que vendiéramos?</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('sugerencias.store')" buttonText="Enviar Sugerencia">
                <x-form.input
                    name="titulo"
                    label="Título de la sugerencia"
                    placeholder="Ej: Auriculares inalámbricos con cancelación de ruido"
                    required
                />

                <x-form.textarea
                    name="texto"
                    label="Descripción"
                    placeholder="Describe el producto que te gustaría que vendiéramos, incluyendo detalles como marca, modelo, características, etc."
                    rows="6"
                    required
                />
            </x-form.form>
        </x-ui.card>
    </div>
@endsection
