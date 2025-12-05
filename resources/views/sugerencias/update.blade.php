@extends('layouts.app')

@section('title', 'Editar Sugerencia')

@section('content')
    <div class="mx-auto max-w-2xl">
        <x-ui.back-link :href="route('sugerencias.show', $sugerencia)" text="Volver a la sugerencia" />

        <div class="mb-6 text-center">
            <div
                class="from-fulvous to-accent mb-3 inline-flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br text-2xl text-white shadow-lg"
            >
                ✏️
            </div>
            <h1 class="text-thistle text-2xl font-bold">Editar Sugerencia</h1>
            <p class="text-thistle/60 mt-1 text-sm">Modifica tu sugerencia</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('sugerencias.update', $sugerencia)" method="PUT" buttonText="Guardar Cambios">
                <x-form.input name="titulo" label="Título de la sugerencia" :value="$sugerencia->titulo" required />

                <x-form.textarea name="texto" label="Descripción" :value="$sugerencia->texto" rows="6" required />
            </x-form.form>
        </x-ui.card>
    </div>
@endsection
