<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return response([
            'total_data' => count($alumnos),
            'data' => $alumnos
        ]);

    }

    public function datos_obtenidos(Request $request)
    {
        $hombres = Alumno::where("genero", "m")->count();
        $mujeres = Alumno::where("genero","f")->count();

        $matutino = Alumno::where("horario","matutino")->count();
        $vespertino = Alumno::where("horario","vespertino")->count();

        $aprobados = Alumno::where("calificacion_de_prepa", ">=", "6")->count();
        $reprobados = Alumno::where("calificaciones_de_prepa","<=", "5")->count();

        $becado = Alumno::where("beca", "si")->count();
        $NoBeca = Alumno::where("beca", "no")->count();

        $enfermo = Alumno::where("problemas_de_salud", "si")->count();
        $saludable = Alumno::where("problemas_de_salud", "no")->count();

        $etnia = Alumno::where("etnia_indigena", "si")->count();
        $NEtnia = Alumno::where("etnia_indigena", "no")->count();


        return response([

            'Alumnos Hombres' => $hombres,
            'Alumnos Mujeres' => $mujeres,

            'Turno Matutino' => $matutino,
            'Turno Vespertino' => $vespertino,

            'Aprobados en Preparatoria' => $aprobados,
            'Reprobados en Preparatoria' => $reprobados,

            'Alumnos Becados' => $becado,
            'Alumnos sin Beca' => $NoBeca,

            'Alumnos con Problemas de salud' => $enfermo,
            'Alumnos sin problemas de salud' => $saludable,

            'Alumnos con Etnia Indigena' => $etnia,
            'Alumnos que no pertenecen a una etnia indigena' => $NEtnia,

        ]);

    }

    public function create(Request $request)
    {
       $data = $this->rules($request);
        Alumno::create($data);
        return response([
            'message' => 'se creo con exito el alumno'
        ]);

    }

    public function show($id)
    {
        $alumno = Alumno::where('_id',$id)->first();
        return response($alumno);

    }

    public function update($id, Request $request)
    {
       $data = $this->rules($request);
       Alumno::find($id)->fill($data)->save();
       return response([
        'message' => 'se modifico con exito'
       ]);

    }

    public function delete($id)
    {
        Alumno::find($id)->delete();
        return response([
            'message' => 'Se elimino con exito'

        ]);
    }

    protected function rules($request){

        return $request->validate([
            'nombre'=>'required|string',
            'edad'=>'required|string',
            'genero' => 'required',
            'carrera'=> 'nullable',
            'horario'=> 'required',
            'calificacion_de_prepa' => 'required',
            'beca' => 'required',
            'etnia_indigena' => 'required',
            'problemas_de_salud' => 'required',

        ]);

    }
    //
}
