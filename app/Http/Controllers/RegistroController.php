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
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\JsonResponse;

class RegistroController extends Controller
{

    use PasswordValidationRules;

	public function store(){
        $departments = Department::all();
        $profiles = Profile::all();
		return view('auth.register',compact('departments', 'profiles'));
	}

    public function create(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'departamento' => $input['departamento'],
            'perfil' => $input['perfil'],
            'status' => 'A'
        ]);
        return app(RegisterResponse::class);
    }

    public function render()
    {
        return view('livewire.users-tabble',['users' => User::paginate(5)
    ]);
    }

    public function query(){
        $users = User::join('departments', 'departments.id', '=', 'users.departamento')
        ->join('profiles', 'profiles.id', '=', 'users.perfil')
        ->select('users.*','departments.name as department_name','profiles.name as profile_name')
        ->where('users.status', 'A')
        ->paginate(5);

		return view('auth.consulta',compact('users'));
	}

    public function edit(Request $id){
        $user = User::findOrFail($id['id']);
        $departments = Department::all();
        $profiles = Profile::all();
		return view('auth.edit',compact('user','departments','profiles'));
	}

    public function delete(Request $id){

        $user = User::findOrFail($id['id']);
        $user->forceFill([
            'status' => 'N',
        ])->save();
        $user->fresh();
        $users = User::where('status', 'A')->paginate(5);
		return view('auth.consulta',compact('users'));
	}
    public function updatePassword(Request $request){
        $input = $request->all();
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($input) {
            if (! isset($input['password']) || $input['password'] == $input['password_confirmation']) {
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ])->validate();


        $user = User::findOrFail($request['id']);
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'status' => $input['estado'],
            'departamento' => $input['departamento'],
            'perfil' => $input['perfil'],
        ])->save();
		return redirect()
                ->route('editar', ['id' => $request['id']])
                ->with('message', 'Guardado con exito');
        }
        else if($request->tipo  == 'password'){
            $input = $request->all();
            Validator::make($input, [
                'password' => $this->passwordRules(),
            ])->after(function ($validator) use ($input) {
                if ($input['password'] != $input['password_confirmation']) {
                    $validator->errors()->add('password', __('La contrase;a no coincide por favor verifique.'));
                    return redirect()
                    ->route('editar', ['id' => $request['id']])
                    ->with('danger', 'la contrasena no coincide');
                }
            });
            $user = User::findOrFail($request['id']);
            $user->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();
            return redirect()
            ->route('editar', ['id' => $request['id']])
            ->with('message', 'Guardado con exito');

        }
	}


}
