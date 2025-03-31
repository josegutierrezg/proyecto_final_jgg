<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Obtener todos los equipos
    public function index()
    {
        $equipos = Equipo::with('jugadores')->get();
        return response()->json($equipos);
    }

    // Obtener un equipo específico
    public function show($id)
    {
        $equipo = Equipo::with('jugadores')->find($id);
        if ($equipo) {
            $equipo = Equipo::with('jugadores')->findOrFail($id);
            return response()->json($equipo);
        } else {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }
    }

    // Crear un equipo con su logo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:equipos',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('equipos', 'public');

        $equipo = Equipo::create([
            'nombre' => $request->nombre,
            'logo' => $logoPath,
        ]);

        return response()->json($equipo, 201);
    }
}

