<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Controlador para la gestión de artículos.
 *
 * Maneja las operaciones CRUD para los artículos del catálogo.
 */
class ArticuloController extends Controller
{
    /**
     * Muestra el listado paginado de artículos.
     *
     * @return View Vista con el listado de artículos
     */
    public function index(): View
    {
        $articulos = Articulo::latest()->paginate(12);

        return view('articulos.index', compact('articulos'));
    }

    /**
     * Muestra el formulario para crear un nuevo artículo.
     *
     * @return View Vista con el formulario de creación
     */
    public function create(): View
    {
        return view('articulos.create');
    }

    /**
     * Almacena un nuevo artículo en la base de datos.
     *
     * @param  Request  $request  Datos del formulario
     * @return RedirectResponse Redirección al listado con mensaje de éxito
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
     * Muestra los detalles de un artículo específico.
     *
     * @param  Articulo  $articulo  Artículo a mostrar
     * @return View Vista con los detalles del artículo
     */
    public function show(Articulo $articulo): View
    {
        return view('articulos.show', compact('articulo'));
    }

    /**
     * Muestra el formulario para editar un artículo existente.
     *
     * @param  Articulo  $articulo  Artículo a editar
     * @return View Vista con el formulario de edición
     */
    public function edit(Articulo $articulo): View
    {
        return view('articulos.update', compact('articulo'));
    }

    /**
     * Actualiza un artículo existente en la base de datos.
     *
     * @param  Request  $request   Datos del formulario
     * @param  Articulo  $articulo  Artículo a actualizar
     * @return RedirectResponse Redirección al detalle con mensaje de éxito
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
     * Elimina un artículo de la base de datos.
     *
     * @param  Articulo  $articulo  Artículo a eliminar
     * @return RedirectResponse Redirección al listado con mensaje de éxito
     */
    public function destroy(Articulo $articulo): RedirectResponse
    {
        $articulo->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Artículo eliminado exitosamente.');
    }
}
