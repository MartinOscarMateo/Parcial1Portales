<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // lista de usuarios 
        $users = User::paginate(15)->WithQueryString();
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Asigna rol al usuario
        $rol = Roles::where('name', $request->role)->first();
        $user->roles()->attach($rol);

        return redirect()->route('users.index')->with('success', 'Usuario creado con éxito.');
    }

    public function update (Request $request, $id)
    {
        // validar y actualizar usuario existente
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $rol = Roles::where('name', $request->role)->first();
        $user->roles()->sync($rol);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito.');
    }


    public function destroy($id)
    {
        // eliminar usuario
        $user = User::findOrFail($id);

        $user->roles()->detach(); // Desvincular roles

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
