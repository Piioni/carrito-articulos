@extends('layouts.app')

@section('title', 'Nueva Sugerencia')

@section('content')
    <div class="max-w-2xl mx-auto">
        <x-ui.back-link :href="route('sugerencias.index')" text="Volver a sugerencias" />

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-br from-fulvous to-accent text-white text-2xl mb-3 shadow-lg">
                💡
            </div>
            <h1 class="text-2xl font-bold text-thistle">Nueva Sugerencia</h1>
            <p class="text-thistle/60 text-sm mt-1">¿Qué producto te gustaría que vendiéramos?</p>
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
