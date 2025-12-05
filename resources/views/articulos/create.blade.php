@extends('layouts.app')

@section('title', 'Crear Artículo')

@section('content')
    <div class="mx-auto max-w-2xl">
        <x-ui.back-link :href="route('articulos.index')" text="Volver a artículos" />

        <div class="mb-6 text-center">
            <div
                class="mb-3 inline-flex h-14 w-14 items-center justify-center rounded-full bg-gradient-to-br from-fulvous to-accent text-2xl text-white shadow-lg"
            >
                📦
            </div>
            <h1 class="text-2xl font-bold text-thistle">Nuevo Artículo</h1>
            <p class="mt-1 text-sm text-thistle/60">Agrega un nuevo producto a la colección</p>
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
