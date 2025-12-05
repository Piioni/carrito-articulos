@extends('layouts.app')

@section('title', $articulo->nombre)

@section('content')
    <div class="mx-auto max-w-4xl">
        @if (session('success'))
            <x-ui.alert type="success">
                {{ session('success') }}
            </x-ui.alert>
        @endif

        <x-ui.back-link :href="route('articulos.index')" text="Volver a artículos" />

        <div class="card-elevated overflow-hidden">
            @if ($articulo->imageUrl)
                <div class="-mx-6 -mt-6 mb-6">
                    <img
                        src="{{ $articulo->imageUrl }}"
                        alt="{{ $articulo->nombre }}"
                        class="h-64 w-full object-cover md:h-96"
                    />
                </div>
            @endif

            <h1 class="mb-4 text-3xl font-bold text-thistle">{{ $articulo->nombre }}</h1>

            @if ($articulo->descripción)
                <div class="prose mb-6 max-w-none">
                    <p class="leading-relaxed whitespace-pre-line text-charcoal/80">{{ $articulo->descripción }}</p>
                </div>
            @endif

            <div class="mb-6 flex items-center gap-4 text-sm text-thistle/60">
                <div class="flex items-center gap-1.5">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                        />
                    </svg>
                    {{ $articulo->created_at->format('d/m/Y') }}
                </div>
                @if ($articulo->updated_at != $articulo->created_at)
                    <div class="flex items-center gap-1.5">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                            />
                        </svg>
                        Actualizado: {{ $articulo->updated_at->format('d/m/Y') }}
                    </div>
                @endif
            </div>

            <div class="divider"></div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('articulos.edit', $articulo) }}" class="btn-secondary">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                        />
                    </svg>
                    Editar
                </a>

                <form
                    action="{{ route('articulos.destroy', $articulo) }}"
                    method="POST"
                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este artículo?');"
                >
                    @csrf
                    @method('DELETE')
                    <x-ui.button type="submit" variant="danger">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            />
                        </svg>
                        Eliminar
                    </x-ui.button>
                </form>
            </div>
        </div>
    </div>
@endsection
