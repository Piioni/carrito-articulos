<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

/**
 * Controlador para la gestión de usuarios.
 *
 * Maneja el registro, autenticación, perfil y eliminación de usuarios.
 */
class UserController extends Controller
{
    /**
     * Muestra el listado paginado de usuarios.
     *
     * @return View Vista con el listado de usuarios
     */
    public function index(): View
    {
        $users = User::latest()->paginate(12);

        return view('users.index', compact('users'));
    }

    /**
     * Muestra el formulario de registro de usuario.
     *
     * @return View Vista con el formulario de registro
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Registra un nuevo usuario y lo autentica automáticamente.
     *
     * @param  Request  $request  Datos del formulario de registro
     * @return RedirectResponse Redirección al perfil del usuario
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('users.show', $user)
            ->with('success', 'Cuenta creada exitosamente.');
    }

    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return View Vista con el formulario de login
     */
    public function showLoginForm(): View
    {
        return view('users.login');
    }

    /**
     * Procesa el inicio de sesión del usuario.
     *
     * @param  Request  $request  Credenciales del usuario
     * @return RedirectResponse Redirección al perfil o error de validación
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('users.show', Auth::user()))
                ->with('success', 'Bienvenido de vuelta.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión del usuario autenticado.
     *
     * @param  Request  $request  Request actual
     * @return RedirectResponse Redirección al listado de artículos
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('articulos.index')
            ->with('success', 'Has cerrado sesión exitosamente.');
    }

    /**
     * Muestra el perfil de un usuario con sus sugerencias.
     *
     * @param  User  $user  Usuario a mostrar
     * @return View Vista con el perfil del usuario
     */
    public function show(User $user): View
    {
        $user->load('sugerencias');

        return view('users.show', compact('user'));
    }

    /**
     * Muestra el formulario para editar el perfil del usuario.
     *
     * @param  User  $user  Usuario a editar
     * @return View Vista con el formulario de edición
     */
    public function edit(User $user): View
    {
        return view('users.update', compact('user'));
    }

    /**
     * Actualiza los datos del perfil del usuario.
     *
     * @param  Request  $request  Datos del formulario
     * @param  User  $user     Usuario a actualizar
     * @return RedirectResponse Redirección al perfil con mensaje de éxito
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.show', $user)
            ->with('success', 'Perfil actualizado exitosamente.');
    }

    /**
     * Elimina la cuenta del usuario.
     *
     * Si el usuario elimina su propia cuenta, cierra la sesión automáticamente.
     *
     * @param  User  $user  Usuario a eliminar
     * @return RedirectResponse Redirección al listado de artículos
     */
    public function destroy(User $user): RedirectResponse
    {
        if (Auth::id() === $user->id) {
            Auth::logout();
        }

        $user->delete();

        return redirect()->route('articulos.index')
            ->with('success', 'Cuenta eliminada exitosamente.');
    }
}
