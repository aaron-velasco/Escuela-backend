<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Validator;

class AlumnoController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Alumno::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = Validator::make($request->all(), [
            'nombre' => 'required|string|max:50',
            'apellidos' => 'required|string|max:200',
            'direccion' => 'required|string|max:100',
            'poblacion' => 'required|string|max:50',
            'codigo_postal' => 'required|integer|digits:5',
            'curso' => 'required|string|max:100',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        $alumno = Alumno::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'curso' => $request->curso,
        ]);

        return response()->json($alumno);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $req = Validator::make($request->all(), [
            'uuid' => 'required',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        $alumno = Alumno::findOrFail($request->uuid);

        return response()->json($alumno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $req = Validator::make($request->all(), [
            'uuid' => 'required',
            'nombre' => 'required|string|max:50',
            'apellidos' => 'required|string|max:200',
            'direccion' => 'required|string|max:100',
            'poblacion' => 'required|string|max:50',
            'codigo_postal' => 'required|integer|digits:5',
            'curso' => 'required|string|max:100',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        $alumno = Alumno::findOrFail($request->uuid);

        $alumno->fill([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'curso' => $request->curso,
        ]);

        $alumno->save();

        return response('Elemento editado correctamente', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $req = Validator::make($request->all(), [
            'uuid' => 'required',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        $alumno = Alumno::findOrFail($request->uuid);

        $alumno->delete();
        
        return response('Elemento eliminado correctamente', 200);
    }
}
