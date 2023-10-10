<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    public function crearTarea(Request $request)
    {
        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->contenido = $request->contenido;
        $tarea->estado = $request->estado;
        $tarea->autor = $request->autor;
        $tarea->save();
        return response()->json([
            "message" => "Tarea creada"
        ], 201);
    }

    public function mostrarTareas()
    {
        $tareas = Tarea::all();
        return response($tareas, 200);
    }

    public function buscarTarea(Request $request)
    {
        $tarea = Tarea::where('id', $request->id)
            ->orWhere('autor', $request->autor)
            ->orWhere('titulo', $request->titulo)
            ->orWhere('estado', $request->estado)
            ->get();
    }

    public function modificarTarea(Request $request) {
        $tarea = Tarea::find($request->id);
        if (!$tarea)
            return response()->json(["message" => "Tarea no encontrada"], 404);
        $tarea->titulo = $request->titulo;
        $tarea->contenido = $request->contenido;
        $tarea->estado = $request->estado;
        $tarea->autor = $request->autor;
        $tarea->save();
        return response()->json([
            "message" => "Tarea modificada"
        ], 200);
    }

    public function eliminarTarea($id) {
        $tarea = Tarea::find($id);
        if (!$tarea)
            return response()->json(["message" => "Tarea no encontrada"], 404);
        $tarea->delete();
        return response()->json(["message" => "Tarea eliminada"], 200);
    }

}