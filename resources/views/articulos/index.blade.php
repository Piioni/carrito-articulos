@extends('layouts.app')

@section('title', 'Artículos')

@section('content')
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <div>
            <h1 class="page-title">Artículos</h1>
            <p class="page-subtitle">Explora nuestra colección de productos</p>
        </div>
        <a href="{{ route('articulos.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Artículo
        </a>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if($articulos->isEmpty())
        <x-ui.empty-state
            icon="📦"
            title="No hay artículos disponibles"
            description="Comienza agregando tu primer artículo a la colección."
        >
            <x-slot:action>
                <a href="{{ route('articulos.create') }}" class="btn-primary">
                    Crear primer artículo
                </a>
            </x-slot:action>
        </x-ui.empty-state>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($articulos as $articulo)
                <a href="{{ route('articulos.show', $articulo) }}" class="group">
                    <div class="card-hover h-full flex flex-col overflow-hidden">
                        @if($articulo->imageUrl)
                            <div class="-mx-6 -mt-6 mb-4 overflow-hidden">
                                <img src="{{ $articulo->imageUrl }}"
                                     alt="{{ $articulo->nombre }}"
                                     class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>
                        @else
                            <div class="-mx-6 -mt-6 mb-4 bg-gradient-to-br from-accent/20 to-cream h-48 flex items-center justify-center">
                                <span class="text-5xl opacity-50">📦</span>
                            </div>
                        @endif

                        <h3 class="text-lg font-bold text-thistle mb-2 group-hover:text-fulvous transition-colors">
                            {{ $articulo->nombre }}
                        </h3>

                        @if($articulo->descripción)
                            <p class="text-charcoal/70 text-sm flex-1 line-clamp-3">
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
