<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    /**
     * Procesar el Login (Bloque Azul)
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('pagina.inicio')->with('success', '¡Has iniciado sesión con éxito!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Listado de usuarios (Index)
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('pagina.inicio')->with('error', 'No tienes permisos para acceder a la gestión de usuarios.');
        }

        $usuarios = User::paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('usuarios.create', ['usuario' => new User(), 'oper' => 'create']);
    }

    /**
     * Guardar nuevo usuario / Añadir Amigo (Store)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'fecha_nacimiento' => 'required|date|before:today',
            'genero' => 'required|in:hombre,mujer',
            'numero_telefono' => 'required|string|max:20',
            'perfil_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('perfil_foto')) {
            $path = $request->file('perfil_foto')->store('perfiles', 'public');
            $validated['perfil_foto'] = 'storage/' . $path;
        }

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        // Si el Admin está creando al usuario
        if (Auth::check() && Auth::user()->isAdmin()) {
            return back()->with('success', '¡Amigo añadido correctamente a la lista!');
        }

        // Si es un registro público
        Auth::login($user);
        return redirect()->route('pagina.inicio');
    }

    /**
     * Mostrar un usuario específico (Show)
     */
    public function show(User $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Formulario de edición (Edit)
     */
    public function edit(User $usuario)
    {
        return view('usuarios.edit', ['usuario' => $usuario, 'oper' => 'edit']);
    }

    /**
     * Actualizar usuario (Update)
     */
    public function update(Request $request, User $usuario)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usuario->id)],
            'password' => 'nullable|string|min:8', // Password opcional al editar
            'fecha_nacimiento' => 'required|date|before:today',
            'genero' => 'required|in:hombre,mujer',
            'numero_telefono' => 'required|string|max:20',
            'perfil_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestionar la foto si se sube una nueva
        if ($request->hasFile('perfil_foto')) {
            // Opcional: Borrar foto anterior si existe
            if ($usuario->perfil_foto) {
                $oldPath = str_replace('storage/', '', $usuario->perfil_foto);
                Storage::disk('public')->delete($oldPath);
            }
            
            $path = $request->file('perfil_foto')->store('perfiles', 'public');
            $validated['perfil_foto'] = 'storage/' . $path;
        }

        // Solo actualizar password si se escribió algo
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $usuario->update($validated);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Eliminar usuario (Destroy)
     */
    public function destroy(User $usuario)
    {
        // No permitir que el admin se borre a sí mismo por accidente
        if ($usuario->id === Auth::id()) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta desde aquí.');
        }

        // --- BORRADO EN CASCADA MANUAL Y SEGURO (RGPD) ---

        // 1. Borrar foto del perfil si existe
        if ($usuario->perfil_foto) {
            $path = str_replace('storage/', '', $usuario->perfil_foto);
            Storage::disk('public')->delete($path);
        }

        // 2. Borrar fotos físicas del disco y BD subidas por el usuario
        $medias = \Illuminate\Support\Facades\DB::table('media')->where('user_id', $usuario->id)->get();
        foreach ($medias as $media) {
            $pathReal = str_replace('storage/', '', $media->url);
            if (Storage::disk('public')->exists($pathReal)) {
                Storage::disk('public')->delete($pathReal);
            }
        }
        \Illuminate\Support\Facades\DB::table('media')->where('user_id', $usuario->id)->delete();

        // 3. Borrar de tablas pivote (amigos, actividad_user)
        \Illuminate\Support\Facades\DB::table('amigos')->where('user_id', $usuario->id)->orWhere('amigo_id', $usuario->id)->delete();
        \Illuminate\Support\Facades\DB::table('actividad_user')->where('user_id', $usuario->id)->delete();
        
        // 4. Borrar mensajes privados del usuario
        \Illuminate\Support\Facades\DB::table('mensajes_privados')->where('user_id', $usuario->id)->orWhere('amigo_id', $usuario->id)->delete();

        // 6. Eliminar usuario
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario y archivos asociados eliminados correctamente.');
    }

    /**
     * Ver Perfil Público
     */
    public function verPerfil($id)
    {
        $usuario = User::findOrFail($id);
        return view('pagina.perfil_ver', compact('usuario'));
    }

    /**
     * Cerrar Sesión (Logout)
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('pagina.login_usuarios');
    }
}