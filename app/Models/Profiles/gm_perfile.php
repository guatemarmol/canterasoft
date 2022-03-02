<?php

namespace App\Models\Profiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gm_perfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_perfil',
        'descripcion_perfil',
        'usuarioid_crea',
        'fecha_crea',
        'usuarioid_modifica',
        'fecha_modifica',
        'gm_usuarioid_usuario',
        'gm_usuariousuario',
        'gm_perfilesid_perfil',
    ];
}
