<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Creacion De Perfil') }}
        </h2>
    </x-slot>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <x-jet-validation-errors class="mb-3" />

        <div class="card-body">
            <form method="POST" action="{{ route('registroPerfil') }}">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="{{ __('Tipo Perfil') }}" />

                    <x-jet-input class="{{ $errors->has('tipo_perfil') ? 'is-invalid' : '' }}" type="text" name="tipo_perfil"
                                 :value="old('tipo_perfil')" required autofocus autocomplete="tipo_perfil" />
                    <x-jet-input-error for="tipo_perfil"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Descripcion') }}" />

                    <x-jet-input class="{{ $errors->has('descripcion_perfil') ? 'is-invalid' : '' }}" type="text" name="descripcion_perfil"
                                 :value="old('descripcion_perfil')" required autofocus autocomplete="descripcion_perfil" />
                    <x-jet-input-error for="descripcion_perfil"></x-jet-input-error>
                </div>


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
