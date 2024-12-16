<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    // Especifica el nombre de la tabla si es diferente al plural del modelo
    protected $table = 'songs';

    // Indica los campos que se pueden rellenar de forma masiva
    protected $fillable = ['titulo', 'grupo', 'estilo', 'puntuacion'];

    // Si la tabla no tiene campos de timestamps como created_at y updated_at, deshabilítalos
    public $timestamps = false;
}
