<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = DB::table('inscripciones')
            ->join('estudiantes', 'inscripciones.estudiante_id', '=', 'estudiantes.id')
            ->join('carreras', 'inscripciones.carrera_id', '=', 'carreras.id')
            ->select('inscripciones.*', 'estudiantes.nombre as estudiante_nombre', 'carreras.nombre as carrera_nombre')
            ->get();

        return view('inscripciones.index', ['inscripciones' => $inscripciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = DB::table('estudiantes')->get();
        $carreras = DB::table('carreras')->get();

        return view('inscripciones.create', ['estudiantes' => $estudiantes, 'carreras' => $carreras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        // Validación de datos
        $request->validate([
            'estudiante_id' => 'required',
            'carrera_id' => 'required',
            'fecha_inscripcion' => 'required',
        ]);

        // Crear la nueva inscripción
        DB::table('inscripciones')->insert([
            'estudiante_id' => $request->estudiante_id,
            'carrera_id' => $request->carrera_id,
            'fecha_inscripcion' => $request->fecha_inscripcion,
        ]);

        // Redireccionar a la lista de inscripciones
        return redirect()->route('inscripciones.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscripcion = DB::table('inscripciones')
        ->join('estudiantes', 'inscripciones.estudiante_id', '=', 'estudiantes.id')
        ->join('carreras', 'inscripciones.carrera_id', '=', 'carreras.id')
        ->select('inscripciones.*', 'estudiantes.nombre as estudiante_nombre', 'estudiantes.apellido as estudiante_apellido', 'carreras.nombre as carrera_nombre')
        ->where('inscripciones.id', $id)
        ->first();

    // Verificar si se encontraron datos para la inscripción
    if (!$inscripcion) {
        abort(404);
    }

    // Pasar los datos a la vista
    return view('inscripciones.show', compact('inscripcion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener la inscripción y las listas de estudiantes y carreras
        $inscripcion = DB::table('inscripciones')->where('id', $id)->first();
        $estudiantes = DB::table('estudiantes')->get();
        $carreras = DB::table('carreras')->get();

        return view('inscripciones.edit', ['inscripcion' => $inscripcion, 'estudiantes' => $estudiantes, 'carreras' => $carreras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'estudiante_id' => 'required',
            'carrera_id' => 'required',
            'fecha_inscripcion' => 'required',
        ]);

        // Actualizar la inscripción
        DB::table('inscripciones')
            ->where('id', $id)
            ->update([
                'estudiante_id' => $request->estudiante_id,
                'carrera_id' => $request->carrera_id,
                'fecha_inscripcion' => $request->fecha_inscripcion,
            ]);

        // Redireccionar a la lista de inscripciones
        return redirect()->route('inscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminar la inscripción
        DB::table('inscripciones')->where('id', $id)->delete();

        // Redireccionar a la lista de inscripciones
        return redirect()->route('inscripciones.index');
    }
}
