<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class Personas extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['index']);
    }

    public function index()
    {
        $titulo = 'Inicio';
        $items = Persona::all();
        $totalGanado = DB::table('persona')
            ->where('tipo', '=', 'Cobro')
            ->sum('cantidad');
        $totalGastado = DB::table('persona')
            ->where('tipo', '=', 'Gasto')
            ->sum('cantidad');
        return view('modules/clientes/index', compact('titulo', 'items', 'totalGanado', 'totalGastado'));
    }

    public function create()
    {
        $titulo = 'Agregar nombre';
        return view('/modules/clientes/create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $item = new Persona();
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->descripcion = $request->descripcion;
        $item->save();
        Alert::success('Agregado', 'Agregado con Exito');
        return redirect('/modules/clientes');
    }

    public function show($id)
    {
        $titulo = 'Eliminar ingreso';
        $items = Persona::find($id);
        return view('/modules/clientes/eliminar', compact('items', 'titulo'));
    }

    public function edit($id)
    {
        $titulo = 'Actualizar datos';
        $items = Registro::find($id);
        return view('/modules/clientes/edit', compact('items', 'titulo'));
    }

    public function update(Request $request, $id)
    {
        $item = Persona::find($id);
        $item->tipo = $request->tipo;
        $item->categoria = $request->categoria;
        $item->cantidad = $request->cantidad;
        $item->descripcion = $request->descripcion;
        $item->fecha = $request->fecha;
        $item->save();
        Alert::success('Actualizo', 'Se actualizo correctamente');
        return redirect('/modules/clientes');
    }

    public function destroy($id)
    {
        $item = Registro::find($id);
        $item->delete();
        Alert::success('Elimino', 'Se elimino correctamente');
        return redirect('/modules/clientes');
    }
}
