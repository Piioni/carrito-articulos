@extends('layouts.app')

@section('title', 'Editar Sugerencia')

@section('content')
    <div class="max-w-2xl mx-auto">
        <x-ui.back-link :href="route('sugerencias.show', $sugerencia)" text="Volver a la sugerencia" />

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-br from-fulvous to-accent text-white text-2xl mb-3 shadow-lg">
                ✏️
            </div>
            <h1 class="text-2xl font-bold text-thistle">Editar Sugerencia</h1>
            <p class="text-thistle/60 text-sm mt-1">Modifica tu sugerencia</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('sugerencias.update', $sugerencia)" method="PUT" buttonText="Guardar Cambios">
                <x-form.input
                    name="titulo"
                    label="Título de la sugerencia"
                    :value="$sugerencia->titulo"
                    required
                />

                <x-form.textarea
                    name="texto"
                    label="Descripción"
                    :value="$sugerencia->texto"
                    rows="6"
                    required
                />
            </x-form.form>
        </x-ui.card>
    </div>
@endsection
