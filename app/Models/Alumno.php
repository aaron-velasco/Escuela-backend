<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['nombre','apellidos','direccion','poblacion','codigo_postal','curso'];
}
