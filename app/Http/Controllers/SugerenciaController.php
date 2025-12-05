<?php

namespace App\Http\Controllers;

use App\Models\Sugerencia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Controlador para la gestión de sugerencias.
 *
 * Maneja las operaciones CRUD para las sugerencias de productos
 * realizadas por los usuarios. Requiere autenticación para crear,
 * editar y eliminar sugerencias.
 */
class SugerenciaController extends Controller implements HasMiddleware
{
    /**
     * Define los middleware aplicables al controlador.
     *
     * @return array<Middleware> Lista de middleware
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Muestra el listado paginado de sugerencias.
     *
     * @return View Vista con el listado de sugerencias
     */
    public function index(): View
    {
        $sugerencias = Sugerencia::with('user')->latest()->paginate(12);

        return view('sugerencias.index', compact('sugerencias'));
    }

    /**
     * Muestra el formulario para crear una nueva sugerencia.
     *
     * @return View Vista con el formulario de creación
     */
    public function create(): View
    {
        return view('sugerencias.create');
    }

    /**
     * Almacena una nueva sugerencia en la base de datos.
     *
     * @param  Request  $request  Datos del formulario
     * @return RedirectResponse Redirección al listado con mensaje de éxito
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
     * Muestra los detalles de una sugerencia específica.
     *
     * @param  Sugerencia  $sugerencia  Sugerencia a mostrar
     * @return View Vista con los detalles de la sugerencia
     */
    public function show(Sugerencia $sugerencia): View
    {
        $sugerencia->load('user');

        return view('sugerencias.show', compact('sugerencia'));
    }

    /**
     * Muestra el formulario para editar una sugerencia existente.
     *
     * @param  Sugerencia  $sugerencia  Sugerencia a editar
     * @return View Vista con el formulario de edición
     */
    public function edit(Sugerencia $sugerencia): View
    {
        return view('sugerencias.update', compact('sugerencia'));
    }

    /**
     * Actualiza una sugerencia existente en la base de datos.
     *
     * @param  Request  $request     Datos del formulario
     * @param  Sugerencia  $sugerencia  Sugerencia a actualizar
     * @return RedirectResponse Redirección al detalle con mensaje de éxito
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
     * Elimina una sugerencia de la base de datos.
     *
     * @param  Sugerencia  $sugerencia  Sugerencia a eliminar
     * @return RedirectResponse Redirección al listado con mensaje de éxito
     */
    public function destroy(Sugerencia $sugerencia): RedirectResponse
    {
        $sugerencia->delete();

        return redirect()->route('sugerencias.index')
            ->with('success', 'Sugerencia eliminada exitosamente.');
    }
}
