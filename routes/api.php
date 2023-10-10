<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

Route::get('/tareas', [TareaController::class, 'mostrarTareas']);
Route::post('/tareas', [TareaController::class, 'crearTarea']);
Route::patch('/tareas/{id}', [TareaController::class, 'modificarTarea']);
Route::delete('/tareas/{id}', [TareaController::class, 'eliminarTarea']);
Route::get('/tareas/buscar', [TareaController::class, 'buscarTarea']);
