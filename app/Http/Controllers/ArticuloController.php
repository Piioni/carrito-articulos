<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articulos = Articulo::latest()->paginate(12);

        return view('articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripción' => 'nullable|string',
            'imageUrl' => 'nullable|url|max:2048',
        ]);

        Articulo::create($validated);

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo): View
    {
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo): View
    {
        return view('articulos.update', compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripción' => 'nullable|string',
            'imageUrl' => 'nullable|url|max:2048',
        ]);

        $articulo->update($validated);

        return redirect()->route('articulos.show', $articulo)
            ->with('success', 'Artículo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo): RedirectResponse
    {
        $articulo->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo eliminado exitosamente.');
    }
}
