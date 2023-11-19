<?php

namespace App\Http\Controllers;

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
        $carreras = DB::table('carreras')->get();
        return view('carreras.index', ['carreras' => $carreras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:carreras',
            'descripcion' => 'required',
            'duracion_anios' => 'required|numeric',
            // Otros campos y reglas de validación según sea necesario
        ]);

        DB::table('carreras')->insert([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'duracion_anios' => $request->input('duracion_anios'),
            // Otros campos según sea necesario
        ]);

        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $carrera = DB::table('carreras')->where('id', $id)->first();
            
            if (!$carrera) {
                abort(404, 'Carrera no encontrada');
            }
    
            return view('carreras.edit', compact('carrera'));
        }
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
        $request->validate([
            'nombre' => 'required|unique:carreras,nombre,'.$id,
            'descripcion' => 'required',
            'duracion_anios' => 'required|numeric',
            // Otros campos y reglas de validación según sea necesario
        ]);

        $carrera = DB::table('carreras')->where('id', $id)->first();

        if (!$carrera) {
            abort(404, 'Carrera no encontrada');
        }

        DB::table('carreras')->where('id', $id)->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'duracion_anios' => $request->input('duracion_anios'),
            // Otros campos según sea necesario
        ]);

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = DB::table('carreras')->where('id', $id)->first();

        if (!$carrera) {
            abort(404, 'Carrera no encontrada');
        }

        DB::table('carreras')->where('id', $id)->delete();

        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente.');
    }
    
}
