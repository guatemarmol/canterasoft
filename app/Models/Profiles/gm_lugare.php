<?php

namespace App\Models\Profiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gm_lugare extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_lugar',
        'descripcion_lugar',
        'usuarioid_crea',
        'fecha_crea',
        'usuarioid_modifica',
        'fecha_modifica',
    ];
}
