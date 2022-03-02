<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Editar Perfil') }}
        </h2>
    </x-slot>
    <div>
    <x-jet-form-profile-edit submit="actualizaPerfil">
        <x-slot name="title">
            {{ __('Informacion del tipo de Perfil') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Actualiza la informacion de el tipo de perfil.') }}
        </x-slot>

        <x-slot name="form">

            <x-slot name="action-mensaje" on="saved">
                {{ __('Guardado con exito.') }}
            </x-slot>

            <div class="w-md-75">

                <div class="mb-3">
                    <x-jet-label for="tipo_perfil" value="{{ __('Tipo de Perfil') }}" />
                    <x-jet-input id="tipo_perfil" type="text" name="tipo_perfil" class="{{ $errors->has('tipo_perfil') ? 'is-invalid' : '' }}" value="{{ $perfil->tipo_perfil}}"  autocomplete="tipo_perfil" required/>
                    <x-jet-input-error for="tipo_perfil" />
                </div>


                 <div class="mb-3">
                    <x-jet-label for="descripcion_perfil" value="{{ __('Descripcion') }}" />
                    <x-jet-input id="descripcion_perfil" type="text" name="descripcion_perfil" class="{{ $errors->has('descripcion_perfil') ? 'is-invalid' : '' }}" value="{{ $perfil->descripcion_perfil}}"  autocomplete="descripcion_perfil" required/>
                    <x-jet-input-error for="descripcion_perfil" />
                </div>


            <input type="hidden" name="id" value="{{$perfil->id_perfil}}">

            <x-slot name="actions">
                <div class="d-flex align-items-baseline">
                    <x-jet-button>
                        <div wire:loading class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Cargando...</span>
                        </div>

                        {{ __('Guardar') }}
                    </x-jet-button>
                </div>
            </x-slot>

        </x-slot>


    </x-jet-form-profile-edit>
</x-app-layout>
