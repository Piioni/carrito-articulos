@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="mb-6">
        <h1 class="page-title">Usuarios</h1>
        <p class="page-subtitle">Miembros de nuestra comunidad</p>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">
            {{ session('success') }}
        </x-ui.alert>
    @endif

    @if($users->isEmpty())
        <x-ui.empty-state
            icon="👥"
            title="No hay usuarios registrados"
            description="Sé el primero en unirte a la comunidad."
        >
            <x-slot:action>
                <a href="{{ route('register') }}" class="btn-primary">
                    Registrarse
                </a>
            </x-slot:action>
        </x-ui.empty-state>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($users as $user)
                <a href="{{ route('users.show', $user) }}" class="group">
                    <div class="card-hover">
                        <div class="flex items-center gap-3">
                            <x-ui.avatar :name="$user->name" />
                            <div class="min-w-0">
                                <h3 class="font-semibold text-thistle truncate group-hover:text-fulvous transition-colors">
                                    {{ $user->name }}
                                </h3>
                                <p class="text-xs text-charcoal/60 truncate">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @endif
@endsection
