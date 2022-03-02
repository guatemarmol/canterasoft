<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profiles\gm_perfile;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\RegisterResponse;

class PerfilController extends Controller
{


    public function query(){
        $perfiles = gm_perfile::paginate(5);

		return view('catalogos.perfil.consulta',compact('perfiles'));
	}

    public function store(){
        $profiles = gm_perfile::all();
		return view('catalogos.perfil.registro',compact('profiles'));
	}

    public function create(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'tipo_perfil' => ['required', 'string', 'max:255'],
            'descripcion_perfil' => ['required', 'string', 'max:255'],
        ])->validate();

        gm_perfile::create([
            'tipo_perfil' => $input['tipo_perfil'],
            'descripcion_perfil' => $input['descripcion_perfil']
        ]);
        return app(RegisterResponse::class);
    }

    public function edit(Request $id){
        $perfil = gm_perfile::findOrFail($id['id']);

		return view('catalogos.perfil.editar',compact('perfil'));
	}

    public function delete(Request $id){
        $user = gm_perfile::findOrFail($id['id']);
        $user->delete();
        $user->fresh();
        $perfiles = gm_perfile::paginate(5);
		return view('catalogos.perfil.consulta',compact('perfiles'));

	}

    public function updateProfile(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'tipo_perfil' => ['required', 'string', 'max:255'],
            'descripcion_perfil' => ['required', 'string', 'max:255'],
        ])->validate();


        $perfil = gm_perfile::findOrFail($request['id']);
        $perfil->forceFill([
            'tipo_perfil' => $input['tipo_perfil'],
            'descripcion_perfil' => $input['descripcion_perfil']
        ])->save();
		return redirect()
                ->route('editarPerfil', ['id' => $request['id']])
                ->with('message', 'Guardado con exito');
	}

}
