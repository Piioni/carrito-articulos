@extends('layouts.app')

@section('title', 'Crear Artículo')

@section('content')
    <div class="max-w-2xl mx-auto">
        <x-ui.back-link :href="route('articulos.index')" text="Volver a artículos" />

        <div class="text-center mb-6">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-br from-fulvous to-accent text-white text-2xl mb-3 shadow-lg">
                📦
            </div>
            <h1 class="text-2xl font-bold text-thistle">Nuevo Artículo</h1>
            <p class="text-thistle/60 text-sm mt-1">Agrega un nuevo producto a la colección</p>
        </div>

        <x-ui.card variant="elevated">
            <x-form.form :action="route('articulos.store')" buttonText="Crear Artículo">
                <x-form.input
                    name="nombre"
                    label="Nombre del artículo"
                    placeholder="Ej: Auriculares Bluetooth"
                    required
                />

                <x-form.textarea
                    name="descripción"
                    label="Descripción"
                    placeholder="Describe las características del artículo..."
                    rows="5"
                />

                <x-form.input
                    name="imageUrl"
                    label="URL de la Imagen"
                    type="url"
                    placeholder="https://ejemplo.com/imagen.jpg"
                />
            </x-form.form>
        </x-ui.card>
    </div>
@endsection
