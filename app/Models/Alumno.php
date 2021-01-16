<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid','nombre','apellidos','direccion','poblacion','codigo_postal','curso'];
}
