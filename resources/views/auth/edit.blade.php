<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>
    <div>
    <x-jet-form-section submit="updateProfileInformation">
        <x-slot name="title">
            {{ __('Informacion de Perfil') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Actualiza la informacion de registro de perfil.') }}
        </x-slot>
        <x-slot name="form">
            <x-slot name="action-mensaje" on="saved">
                {{ __('Guardado con exito.') }}
            </x-slot>

            <div class="w-md-75">
                <!-- Name -->
                <div class="mb-3">
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $user->name}}"  autocomplete="name" />
                    <x-jet-input-error for="name" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $user->email}}" />
                    <x-jet-input-error for="email" />
                </div>
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
                <x-jet-label value="{{ __('Estado') }}" />

                <select id="perfil"  class="form-control" name="perfil">
                    <option value="0"  >
                        Seleccione Estado
                    </option>
                    <option value="A"  >
                        Activo
                    </option>
                    <option value="N" >
                        Inactivo
                    </option>
                    <option value="B" >
                        Bloqueado
                    </option>

                </select>
            </div>


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


    </x-jet-form-section>
    <x-jet-section-border />
    <div>

        <x-jet-form-section submit="updatePassword">
            <x-slot name="title">
                {{ __('Cambiar Contraseña') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
            </x-slot>

            <x-slot name="form">
                <div class="w-md-75">

                    <div class="mb-3">
                        <x-jet-label for="password" value="{{ __('Nueva Contraseña') }}" />
                        <x-jet-input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                     wire:model.defer="state.password" autocomplete="new-password" />
                        <x-jet-input-error for="password" />
                    </div>

                    <div class="mb-3">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                        <x-jet-input id="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                     wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                        <x-jet-input-error for="password_confirmation" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>

                    {{ __('Guardar') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>
</x-app-layout>
