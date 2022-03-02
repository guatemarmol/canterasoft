<?php

namespace App\Models\Profiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gm_equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_equipo',
        'lugar_id',
        'usuarioid_crea',
        'fecha_crea',
        'usuarioid_modifica',
        'fecha_modifica',
    ];
}
