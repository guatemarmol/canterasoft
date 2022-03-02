<?php

namespace App\Models\Profiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gm_turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'inicia_turno',
        'fin_turno',
        'lugar_id',
        'usuarioid_crea',
        'fecha_crea',
        'usuarioid_modifica',
        'fecha_modifica',
    ];
}
