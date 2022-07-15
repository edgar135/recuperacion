<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Alumno extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'Alumnos';
    protected $fillable=[
        'nombre',
        'edad',
        'genero',
        'carrera',
        'horario',
        'calificacion_de_prepa',
        'beca',
        'etnia_indigena',
        'problemas_de_salud',
    ];
    use HasFactory;
}
