<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Utilizar el facade DB para realizar la consulta
         $carreras = DB::table('carreras')
            ->select('carreras.*')
            ->get();
        return json_encode(['carreras' => $carreras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->descripcion = $request->descripcion;
        $carrera->duracion_anios = $request->duracion_anios;
        $carrera->save();
        return json_encode(['carrera' => $carrera]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = DB::table('carreras')
        ->where('id', $id)
        ->first();
    return json_encode(['carrera' => $carrera]);
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
        $affected = DB::table('carreras')
        ->where('id', $id)
        ->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'duracion_anios' => $request->duracion_anios,
        ]);

    $carrera = Carrera::find($id);
    return json_encode(['carrera' => $carrera]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('carreras')->where('id', $id)->delete();

        $carreras = DB::table('carreras')
            ->select('carreras.*')
            ->get();
        return json_encode(['carreras' => $carreras, 'success' => true]);
    }
}
