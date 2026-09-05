<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegistroRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\rols;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function index()
    {
        $users = User::with('roles')->get();

        $totalUsers = User::count();

        $Admins = Role::findByName('Admin');
        $totalAdmin = $Admins->users()->count();

        $Lideres = Role::findByName('Lider');
        $totalLideres = $Lideres->users()->count();

        $Pastores = Role::findByName('Pastor');
        $totalPastores = $Pastores->users()->count();
        
        $rols = Role::all();

        return view('admin.users.index', compact('users', 'rols', 'totalUsers', 'totalAdmin', 'totalLideres', 'totalPastores'));
    }

    function create()
    {
        $rols = Role::where('name', '!=', 'Admin')->get();
        $ruta = route('admin.user.store');
        $method = 'POST';
        return view('admin.users.form', compact('rols', 'ruta', 'method'));
    }

    function store(RegistroRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'last_name' => $request->last_name,
            'rol_id' => $request->rol_id,
            'telefono' => $request->telefono
        ]);

        return redirect()->route('admin.user.index')->with('success', 'Usuario ' . $request->name . ' creado correctamente');
    }

    function update(ProfileUpdateRequest $request, int $user)
    {

        $usuario = User::findOrFail($user);

        $usuario->update($request->validated());

        return redirect()->route('admin.user.index')->with('success',  'Usuario ' . $request->name . ' actualizado correctamente');
    }

    function destroy(int $user)
    {
        $usuario = User::findOrFail($user);
        $usuario->delete();
        return redirect()->route('admin.user.index')->with('success',  'Ministerio eliminado correctamente');
    }
}
