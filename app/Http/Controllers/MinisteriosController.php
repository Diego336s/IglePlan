<?php

namespace App\Http\Controllers;


use App\Http\Requests\Ministerios\StoreMinisteriosRequest;
use App\Http\Requests\Ministerios\UpdateMinisteriosRequest;
use App\Models\ministerios;
use Illuminate\Http\Request;

class MinisteriosController extends Controller
{
    public function index()
    {

        $ministerios = ministerios::all();
        $totalMinisterios = ministerios::all()->count();
        $ministeriosActivos = ministerios::where('estado', '=', true)->count();
        $ministeriosInactivos = ministerios::where('estado', '=', false)->count();

        return view('admin.ministerios.index', compact('ministerios', 'ministeriosActivos', 'totalMinisterios', 'ministeriosInactivos'));
    }

    public function create()
    {
        $ruta = route('admin.ministerios.store');
        $method = 'POST';
        return view('admin.ministerios.form', compact('ruta', 'method'));
    }

    public function store(StoreMinisteriosRequest $request)
    {
        ministerios::create($request->validated());

        return redirect()->route('admin.ministerios.index')->with('success', 'Ministerio: ' . $request->ministerio . ' creado correctamente.');
    }

    public function update(UpdateMinisteriosRequest $request, int $id) {
         $user = ministerios::findOrFail($id);
         $user->update($request->validated());

          return redirect()->route('admin.ministerios.index')->with('success', 'Ministerio: ' . $request->ministerio . ' actualizado correctamente correctamente.');
    }

    public function destroy(int $id)
    {
        $user = ministerios::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.ministerios.index')->with('success',  'Usuario eliminado correctamente');
    }
}
