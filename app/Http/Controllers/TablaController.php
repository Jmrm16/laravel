<?php

namespace App\Http\Controllers;

use App\Models\Tabla;
use Illuminate\Http\Request;

class TablaController extends Controller
{
    public function index()
    { 
        $tablas = Tabla::all();
        return view('tablas.index', compact('tablas'));   
    }

   
    public function create()
    {
        return view('tablas.create');
    }

  
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_completo' => 'required|string|min:5|max:255',
            'direccion' => 'required|string|min:5|max:255',
            'observacion' => 'required|string|min:5|max:255',

        ]);

         // Crear un nuevo estudiante usando el método `create` del modelo
        Tabla::create($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('tablas.index');
    }

   
    public function show(string $id)
    {
        
    }

    
    public function edit(string $id)
    {
        $tabla = Tabla::findOrFail($id);
        return view('tablas.edit', compact('tabla'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_completo' => 'required|string|min:5|max:255',
            'direccion' => 'required|string|min:5|max:255',
            'observacion' => 'required|string|min:5|max:255',
        ]);

        // Buscar el estudiante por su ID
        $tabla= Tabla::findOrFail($id);

        // Actualizar los datos del estudiante
        $tabla->update($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('tablas.index');
    }


   
    public function destroy(string $id)
    {
        $tabla = Tabla::findOrFail($id);

        $tabla->delete();

        return redirect()->route('tablas.index');
    }

}
