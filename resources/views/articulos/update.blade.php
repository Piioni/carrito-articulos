@extends('layouts.app')

@section('title', 'Editar Artículo')

@section('content')
    <div class="max-w-2xl mx-auto">
        <x-ui.back-link :href="route('articulos.show', $articulo)" text="Volver al artículo" />

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-br from-fulvous to-accent text-white text-2xl mb-3 shadow-lg">
                ✏️
            </div>
            <h1 class="text-2xl font-bold text-thistle">Editar Artículo</h1>
            <p class="text-thistle/60 text-sm mt-1">Modifica la información del producto</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('articulos.update', $articulo)" method="PUT" buttonText="Guardar Cambios">
                <x-form.input
                    name="nombre"
                    label="Nombre del artículo"
                    :value="$articulo->nombre"
                    required
                />

                <x-form.textarea
                    name="descripción"
                    label="Descripción"
                    :value="$articulo->descripción"
                    rows="5"
                />

                <x-form.input
                    name="imageUrl"
                    label="URL de la Imagen"
                    type="url"
                    :value="$articulo->imageUrl"
                    placeholder="https://ejemplo.com/imagen.jpg"
                />
            </x-form.form>
        </x-ui.card>
    </div>
@endsection
