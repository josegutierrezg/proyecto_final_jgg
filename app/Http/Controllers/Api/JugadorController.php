<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        return response()->json(Jugador::with('equipo')->get());
    }


    public function show($id)
    {
        $jugador = Jugador::with('equipo')->find($id);
        if ($jugador) {
            return response()->json($jugador);
        } else {
            return response()->json(['message' => 'Jugador no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'alias' => 'nullable|string|max:255',
            'posicion' => 'nullable|string|max:255',
            'equipo_id' => 'required|exists:equipos,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagenPath = $request->file('imagen')->store('jugadores', 'public');

        $jugador = Jugador::create([
            'nombre' => $request->nombre,
            'alias' => $request->alias,
            'posicion' => $request->posicion,
            'equipo_id' => $request->equipo_id,
            'imagen' => $imagenPath,
        ]);

        return response()->json($jugador, 201);
    }

    // Actualizar un jugador
    public function update(Request $request, $id)
    {
        $jugador = Jugador::find($id);
        if (!$jugador) {
            return response()->json(['message' => 'Jugador no encontrado'], 404);
        }

        $jugador->update($request->all());

        return response()->json($jugador);
    }

    // Eliminar un jugador
    public function destroy($id)
    {
        $jugador = Jugador::find($id);
        if ($jugador) {
            $jugador->delete();
            return response()->json(['message' => 'Jugador eliminado']);
        } else {
            return response()->json(['message' => 'Jugador no encontrado'], 404);
        }
    }
}
