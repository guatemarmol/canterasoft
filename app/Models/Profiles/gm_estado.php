<?php

namespace App\Models\Profiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gm_estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_estado',
        'usuarioid_crea',
        'fecha_crea',
        'usuarioid_modifica',
        'fecha_modifica',
    ];
}
