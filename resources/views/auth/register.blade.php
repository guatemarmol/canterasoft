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

                    <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                 :value="old('name')" required autofocus autocomplete="name" />
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Correo Electronico') }}" />

                    <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                                 :value="old('email')" required />
                    <x-jet-input-error for="email"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Departamento') }}" />

                    <select id="departamento"  class="form-control" name="departamento">
                        <option value="0"  >
                            Seleccione departamento
                        </option>
                        <option value="1"  >
                            informatica
                        </option>
                        <option value="2" >
                            Bodega
                        </option>
                        <option value="3" >
                            Administracion
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Perfil') }}" />

                    <select id="perfil"  class="form-control" name="perfil">
                        <option value="0"  >
                            Seleccione Perfil
                        </option>
                        <option value="1"  >
                            Administrador
                        </option>
                        <option value="2" >
                            Usuario estandar
                        </option>

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
