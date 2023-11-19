<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstudianteController; 
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\InscripcionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Rutas para Estudiantes
    Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
    Route::get('/estudiantes/create', [EstudianteController::class, 'create'])->name('estudiantes.create');
    // Otras rutas para Estudiantes

    // Rutas para Carreras
    Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
    Route::get('/carreras/create', [CarreraController::class, 'create'])->name('carreras.create');
    // Otras rutas para Carreras

    // Rutas para Inscripciones
    Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
    Route::get('/inscripciones/create', [InscripcionController::class, 'create'])->name('inscripciones.create');
    // Otras rutas para Inscripciones
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
