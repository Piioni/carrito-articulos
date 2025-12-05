@extends('layouts.app')

@section('title', 'Perfil de ' . $user->name)

@section('content')
    <div class="max-w-3xl mx-auto">
        @if(session('success'))
            <x-ui.alert type="success">
                {{ session('success') }}
            </x-ui.alert>
        @endif

        {{-- Profile Header --}}
        <div class="card-elevated mb-6">
            <div class="flex items-center gap-4">
                <x-ui.avatar :name="$user->name" size="lg" />

                <div class="flex-1 min-w-0">
                    <h1 class="text-xl font-bold text-thistle truncate">{{ $user->name }}</h1>
                    <p class="text-sm text-charcoal/70 truncate">{{ $user->email }}</p>
                    <p class="text-xs text-thistle/50 mt-0.5">
                        Miembro desde {{ $user->created_at->format('d M, Y') }}
                    </p>
                </div>

                @if(auth()->id() === $user->id)
                    <div class="flex gap-2 shrink-0">
                        <a href="{{ route('users.edit', $user) }}" class="btn-secondary" title="Editar perfil">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar tu cuenta? Esta acción no se puede deshacer.')">
                            @csrf
                            @method('DELETE')
                            <x-ui.button type="submit" variant="danger" title="Eliminar cuenta">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </x-ui.button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        {{-- User's Suggestions --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-thistle">
                Sugerencias
                <span class="text-thistle/50 font-normal">({{ $user->sugerencias->count() }})</span>
            </h2>
            @if(auth()->id() === $user->id)
                <a href="{{ route('sugerencias.create') }}" class="btn-primary">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Nueva
                </a>
            @endif
        </div>

        @if($user->sugerencias->isEmpty())
            <div class="card text-center py-8">
                <p class="text-thistle/60 text-sm">
                    @if(auth()->id() === $user->id)
                        Aún no has creado sugerencias.
                    @else
                        Este usuario no tiene sugerencias.
                    @endif
                </p>
            </div>
        @else
            <div class="space-y-3">
                @foreach($user->sugerencias as $sugerencia)
                    <a href="{{ route('sugerencias.show', $sugerencia) }}" class="block group">
                        <div class="card-hover">
                            <div class="flex justify-between items-start gap-3">
                                <div class="min-w-0">
                                    <h3 class="font-semibold text-thistle group-hover:text-fulvous transition-colors truncate">
                                        {{ $sugerencia->titulo }}
                                    </h3>
                                    <p class="text-sm text-charcoal/60 line-clamp-1">
                                        {{ $sugerencia->texto }}
                                    </p>
                                </div>
                                <span class="text-xs text-thistle/50 shrink-0">
                                    {{ $sugerencia->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
