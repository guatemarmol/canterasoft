<?php

namespace App\Models\Profiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\gm_usuario as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class gm_usuario extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'usuario',
        'nombre',
        'clave',
        'correo',
        'equipoid',
        'lugarid',
        'perfilid',
        'estadoid',
        'usuarioid_crea',
        'fecha_crea',
        'usuarioid_modifica',
        'fecha_modifica',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'clave'
    ];

}
