<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\EquipoController;

Route::get('equipos', [EquipoController::class, 'index']);
Route::get('equipos/{id}', [EquipoController::class, 'show']);
Route::post('equipos', [EquipoController::class, 'store']);

Route::get('jugadores', [JugadorController::class, 'index']);
Route::get('jugadores/{id}', [JugadorController::class, 'show']);
Route::post('jugadores', [JugadorController::class, 'store']);
