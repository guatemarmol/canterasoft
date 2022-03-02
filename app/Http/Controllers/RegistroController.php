<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use App\Actions\Fortify\PasswordValidationRules;
use App\Models\Profiles\gm_equipo;
use App\Models\Profiles\gm_estado;
use App\Models\Profiles\gm_lugare;
use App\Models\Profiles\gm_perfile;
use App\Models\Profiles\gm_turno;
use App\Models\Profiles\gm_usuario;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Crypt;


class RegistroController extends Controller
{

    use PasswordValidationRules;

	public function store(){
        $departments = gm_lugare::all();
        $profiles = gm_perfile::all();
        $equipos = gm_equipo::all();
		return view('auth.register',compact('departments', 'profiles', 'equipos'));
	}

    public function create(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'usuario' => ['required', 'string', 'max:255', 'unique:gm_usuarios'],
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:gm_usuarios'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        gm_usuario::create([
            'usuario' => $input['usuario'],
            'nombre' => $input['nombre'],
            'correo' => $input['correo'],
            'clave' => Hash::make($input['password']),
            'equipoid' => $input['departamento'],
            'lugarid' => $input['departamento'],
            'perfilid' => $input['perfil'],
            'estadoid' => 1
        ]);
        return app(RegisterResponse::class);
    }

    public function render()
    {
        return view('livewire.users-tabble',['users' => User::paginate(5)
    ]);
    }

    public function query(){
        $users = gm_usuario::join('gm_lugares', 'id_lugar', '=', 'gm_usuarios.lugarid')
        ->join('gm_perfiles', 'id_perfil', '=', 'gm_usuarios.perfilid')
        ->select('gm_usuarios.*','gm_lugares.nombre_lugar as department_name','gm_perfiles.tipo_perfil as profile_name')
        ->where('gm_usuarios.estadoid','=', 1)
        ->paginate(5);

		return view('auth.consulta',compact('users'));
	}

    public function edit(Request $id){
        $user = gm_usuario::findOrFail($id['id']);
        $departments = gm_lugare::all();
        $profiles = gm_perfile::all();
        $equipos = gm_equipo::all();
        $turnos = gm_turno::all();
        $estados = gm_estado::all();
		return view('auth.edit',compact('user','departments','profiles', 'equipos', 'turnos', 'estados'));
	}

    public function delete(Request $id){


        $user = gm_usuario::findOrFail($id['id']);
        $user->forceFill([
            'estadoid' => 3,
        ])->save();
        $user->fresh();
        $users = gm_usuario::where('estadoid', 1)->paginate(5);
		return view('auth.consulta',compact('users'));

	}
    public function updatePassword(Request $request){
        $input = $request->all();
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($input) {
            if ($input['password'] != $input['password_confirmation']) {
                $validator->errors()->add('password', __('La contrase;a no coincide por favor verifique.'));
            }
        });
        $user = User::findOrFail($request['id']);
        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
		return view('auth.edit',compact('user'));
	}

    public function updateProfile(Request $request){
        if($request->tipo  == 'profile'){
        $id = Crypt::encryptString($request->id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
        ])->validate();


        $user = gm_usuario::findOrFail($request['id']);
        $user->forceFill([
            'nombre' => $input['nombre'],
            'usuario' => $input['usuario'],
            'correo' => $input['correo'],
            'estadoid' => $input['estado'],
            'lugarid' => $input['departamento'],
            'perfilid' => $input['perfil'],
            'equipoid' => $input['equipo'],
            'turnoid' => $input['turno'],
        ])->save();
		return redirect()
                ->route('editar', ['id' => $request['id']])
                ->with('message', 'Guardado con exito');
        }
        else if($request->tipo  == 'password'){
            $input = $request->all();
            Validator::make($input, [
                'clave' => $this->passwordRules(),
            ])->after(function ($validator) use ($input) {
                if ($input['clave'] != $input['password_confirmation']) {
                    $validator->errors()->add('clave', __('La contrase;a no coincide por favor verifique.'));
                    return redirect()
                    ->route('editar', ['id' => $request['id']])
                    ->with('danger', 'la contrasena no coincide');
                }
            });
            $user = gm_usuario::findOrFail($request['id']);
            $user->forceFill([
                'clave' => Hash::make($input['clave']),
            ])->save();
            return redirect()
            ->route('editar', ['id' => $request['id']])
            ->with('message', 'Guardado con exito');
        }
	}


}
