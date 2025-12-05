@extends('layouts.app')

@section('title', 'Artículos')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="page-title">Artículos</h1>
            <p class="page-subtitle">Explora nuestra colección de productos</p>
        </div>
        <a href="{{ route('articulos.create') }}" class="btn-primary">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nuevo Artículo
        </a>
    </div>

    @if (session('success'))
        <x-ui.alert type="success">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($articulos->isEmpty())
        <x-ui.empty-state
                icon="📦"
                title="No hay artículos disponibles"
                description="Comienza agregando tu primer artículo a la colección."
        >
            <x-slot:action>
                <a href="{{ route('articulos.create') }}" class="btn-primary">Crear primer artículo</a>
            </x-slot>
        </x-ui.empty-state>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($articulos as $articulo)
                <a href="{{ route('articulos.show', $articulo) }}" class="group">
                    <div class="card flex h-full flex-col overflow-hidden">
                        @if ($articulo->imageUrl)
                            <div class="-mx-6 -mt-6 mb-4 overflow-hidden">
                                <img
                                        src="{{ $articulo->imageUrl }}"
                                        alt="{{ $articulo->nombre }}"
                                        class="h-48 w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                />
                            </div>
                        @else
                            <div
                                    class="-mx-6 -mt-6 mb-4 flex h-48 items-center justify-center bg-gradient-to-br from-accent/20 to-cream"
                            >
                                <span class="text-5xl opacity-50">📦</span>
                            </div>
                        @endif

                        <h3 class="mb-2 text-lg font-bold text-thistle transition-colors group-hover:text-fulvous">
                            {{ $articulo->nombre }}
                        </h3>

                        @if ($articulo->descripción)
                            <p class="line-clamp-3 flex-1 text-sm text-charcoal/70">
                                {{ Str::limit($articulo->descripción, 100) }}
                            </p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $articulos->links() }}
        </div>
    @endif
@endsection
