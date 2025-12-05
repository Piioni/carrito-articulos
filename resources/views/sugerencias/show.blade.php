@extends('layouts.app')

@section('title', $sugerencia->titulo)

@section('content')
    <div class="mx-auto max-w-4xl">
        @if (session('success'))
            <x-ui.alert type="success">
                {{ session('success') }}
            </x-ui.alert>
        @endif

        <x-ui.back-link :href="route('sugerencias.index')" text="Volver a sugerencias" />

        <div class="card-elevated">
            <h1 class="mb-6 text-3xl font-bold text-thistle">{{ $sugerencia->titulo }}</h1>

            {{-- Author info --}}
            <div class="mb-6 flex items-center gap-4 border-b border-accent/20 pb-6">
                <a
                    href="{{ route('users.show', $sugerencia->user) }}"
                    class="flex items-center gap-3 transition-opacity hover:opacity-80"
                >
                    <x-ui.avatar :name="$sugerencia->user->name" />
                    <div>
                        <span class="block font-semibold text-thistle">{{ $sugerencia->user->name }}</span>
                        <span class="text-sm text-thistle/60">{{ $sugerencia->created_at->format('d M, Y') }}</span>
                    </div>
                </a>
            </div>

            {{-- Content --}}
            <div class="prose mb-6 max-w-none">
                <p class="text-lg leading-relaxed whitespace-pre-line text-charcoal/80">{{ $sugerencia->texto }}</p>
            </div>

            @if (auth()->id() === $sugerencia->user_id)
                <div class="divider"></div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('sugerencias.edit', $sugerencia) }}" class="btn-secondary">
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
                        action="{{ route('sugerencias.destroy', $sugerencia) }}"
                        method="POST"
                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta sugerencia?');"
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
            @endif
        </div>
    </div>
@endsection
