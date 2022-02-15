<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Contracts\RegisterResponse;
$urlServer = config('app.APP_URL');

class RegistroController extends Controller
{

    use PasswordValidationRules;

	public function store(){
		return view('auth.register');
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
            'perfil' => $input['perfil']
        ]);
        return app(RegisterResponse::class);
    }

    public function render()
    {
        return view('livewire.users-tabble',['users' => User::paginate(3)
    ]);
    }

    public function query(){
        $users = User::where('status', 'A')->paginate(5);
       // $users = User::where('status', 'A')->get();
        //$users->fresh();

		return view('auth.consulta',compact('users'));
	}

    public function edit(Request $id){
        $user = User::findOrFail($id['id']);
		return view('auth.edit',compact('user'));
	}

    public function delete(Request $id){
        $users = User::where('status', 'A')->paginate(5);
        $user = User::findOrFail($id['id']);
        $user->forceFill([
            'status' => 'N',
        ])->save();
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


}
