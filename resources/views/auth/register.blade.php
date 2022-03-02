<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Creacion Usuario') }}
        </h2>
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('registro') }}">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="{{ __('Nombre') }}" />

                    <x-jet-input class="{{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre"
                                 :value="old('nombre')" required autofocus autocomplete="nombre" />
                    <x-jet-input-error for="nombre"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Usuario') }}" />

                    <x-jet-input class="{{ $errors->has('usuario') ? 'is-invalid' : '' }}" type="text" name="usuario"
                                 :value="old('usuario')" required autofocus autocomplete="user" />
                    <x-jet-input-error for="usuario"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Correo Electronico') }}" />

                    <x-jet-input class="{{ $errors->has('correo') ? 'is-invalid' : '' }}" type="email" name="correo"
                                 :value="old('correo')" required />
                    <x-jet-input-error for="correo"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Departamento') }}" />

                    <select id="departamento"  class="form-control" name="departamento" required>
                        <option value=""  >
                            Seleccione Departamento
                        </option>
                        @foreach ($departments as $value)
                        <option value="{{ $value->id_lugar }}">
                           {{ $value->nombre_lugar}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Perfil') }}" />

                    <select id="perfil"  class="form-control" name="perfil" required>
                        <option value=""  >
                            Seleccione Perfil
                        </option>
                        @foreach ($profiles as $value)
                        <option value="{{ $value->id_perfil }}">
                           {{ $value->tipo_perfil}}
                        </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Equipo') }}" />

                    <select id="equipo"  class="form-control" name="equipo" required>
                        <option value=""  >
                            Seleccione Equipo
                        </option>
                        @foreach ($equipos as $value)
                        <option value="{{ $value->id_equipos }}">
                           {{ $value->nombre_equipo}}
                        </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Contraseña') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirmar Contraseña') }}" />

                    <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">


                        <x-jet-button>
                            {{ __('Guardar') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-app-layout>
