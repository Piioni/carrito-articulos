@extends('layouts.app')

@section('title', 'Sugerencias')

@section('content')
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="page-title">Sugerencias</h1>
            <p class="page-subtitle">Ideas de productos sugeridos por la comunidad</p>
        </div>
        @auth
            <a href="{{ route('sugerencias.create') }}" class="btn-primary">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nueva Sugerencia
            </a>
        @endauth
    </div>

    @if (session('success'))
        <x-ui.alert type="success">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if ($sugerencias->isEmpty())
        <x-ui.empty-state
            icon="💡"
            title="No hay sugerencias disponibles"
            description="Sé el primero en sugerir un producto que te gustaría ver."
        >
            <x-slot:action>
                @auth
                    <a href="{{ route('sugerencias.create') }}" class="btn-primary">Crear primera sugerencia</a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary">Inicia sesión para sugerir</a>
                @endauth
            </x-slot>
        </x-ui.empty-state>
    @else
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($sugerencias as $sugerencia)
                <a href="{{ route('sugerencias.show', $sugerencia) }}" class="group">
                    <div class="card flex h-full flex-col">
                        <h3 class="mb-3 text-lg font-bold text-thistle transition-colors group-hover:text-fulvous">
                            {{ $sugerencia->titulo }}
                        </h3>

                        <p class="mb-4 line-clamp-3 flex-1 text-sm text-charcoal/70">
                            {{ Str::limit($sugerencia->texto, 150) }}
                        </p>

                        <div class="flex items-center justify-between border-t border-accent/20 pt-4">
                            <div class="flex items-center gap-2">
                                <x-ui.avatar :name="$sugerencia->user->name" size="sm" />
                                <span class="text-sm font-medium text-thistle">
                                    {{ $sugerencia->user->name }}
                                </span>
                            </div>
                            <span class="text-xs text-thistle/60">
                                {{ $sugerencia->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $sugerencias->links() }}
        </div>
    @endif
@endsection
