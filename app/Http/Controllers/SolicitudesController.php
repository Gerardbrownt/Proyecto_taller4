<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    // Mostrar todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    // Mostrar formulario para crear nueva solicitud
    public function create()
    {
        return view('solicitudes.create');
    }

    // Guardar nueva solicitud en base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tema' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'area' => 'required|string',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date',
            'estado' => 'required|string',
            'observacion' => 'nullable|string',
        ]);

        // Añadir usuarioExt como booleano (si no viene, es false)
        $validated['usuarioExt'] = $request->has('usuarioExt');

        Solicitud::create($validated);


        return redirect()->route('solicitudes.index')
                         ->with('success', 'Solicitud creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        return view('solicitudes.edit', compact('solicitud'));
    }

    // Actualizar la solicitud
    public function update(Request $request, $id)
    {
        $request->validate([
            'tema' => 'required|max:255',
            'descripcion' => 'required',
            'area' => 'required|in:It,Contabilidad,Administrativo,Operativo',
            'fecha_registro' => 'required|date',
            'fecha_cierre' => 'nullable|date|after_or_equal:fecha_registro',
            'estado' => 'required|in:Solicitado,Aprobado,Rechazado',
            'observacion' => 'nullable|string',
            'usuarioExt' => 'required|boolean',
        ]);

        $solicitud = Solicitud::findOrFail($id);
        $solicitud->update($request->all());

        return redirect()->route('solicitudes.index')
                         ->with('success', 'Solicitud actualizada correctamente.');
    }

    // Eliminar solicitud
    public function destroy($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('solicitudes.index')
                         ->with('success', 'Solicitud eliminada correctamente.');
    }
}
