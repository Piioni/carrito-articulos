<?php

namespace App\Http\Controllers;

use App\Models\Sugerencia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sugerencias = Sugerencia::with('user')->latest()->paginate(12);

        return view('sugerencias.index', compact('sugerencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('sugerencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        Sugerencia::create($validated);

        return redirect()->route('sugerencias.index')
            ->with('success', 'Sugerencia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sugerencia $sugerencia): View
    {
        $sugerencia->load('user');

        return view('sugerencias.show', compact('sugerencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sugerencia $sugerencia): View
    {
        return view('sugerencias.update', compact('sugerencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sugerencia $sugerencia): RedirectResponse
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'texto' => 'required|string',
        ]);

        $sugerencia->update($validated);

        return redirect()->route('sugerencias.show', $sugerencia)
            ->with('success', 'Sugerencia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sugerencia $sugerencia): RedirectResponse
    {
        $sugerencia->delete();

        return redirect()->route('sugerencias.index')
            ->with('success', 'Sugerencia eliminada exitosamente.');
    }
}
