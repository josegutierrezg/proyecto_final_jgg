<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Equipo; // Asegúrate de importar el modelo

Route::get('/', function () {
    return response()->json(Equipo::with('jugadores')->get()); 
});

