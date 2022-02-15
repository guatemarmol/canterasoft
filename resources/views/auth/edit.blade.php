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
                    {{ $selected1='' }} {{ $selected='' }} {{ $selected2='' }} {{ $selected3='' }}
                    @if( $user->departamento == '0' )
                    {{$selected='selected' }}
                    @elseif ( $user->departamento == '1' )
                    {{$selected1='selected' }}
                    @elseif ( $user->departamento == '2' )
                    {{$selected1='selected' }}
                    @elseif  ( $user->departamento == '3' )
                    {{$selected1='selected' }}
                    @endif
                    <option value="{{ $user->departamento ? '0' : '0' }}" {{ $selected}} >
                        Seleccione departamento
                    </option>
                    <option value="{{ $user->departamento ? '1' : '1' }}" {{ $selected1}}  >
                        informatica
                    </option>
                    <option value="{{ $user->departamento ? '2' : '2' }}" {{ $selected2}}  >
                        Bodega
                    </option>
                    <option value="{{ $user->departamento ? '3' : '3' }}" {{ $selected3}}  >
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

        <div class="row">
            <div class="col-md-4">
                <x-jet-section-title>
                  <x-slot name="title">
                {{ __('Cambiar Contraseña') }}
            </x-slot>
            <x-slot name="description">
                {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}

                        <span class="small">
                            {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
                        </span>
                    </x-slot>
                </x-jet-section-title>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <form method="POST" action="/editar" class="justify-content-left mb-4">
                        @csrf
                        <div class="card-body">

                                <div class="w-md-75">

                                    <div class="mb-3">
                                        <x-jet-label for="password" value="{{ __('Nueva Contraseña') }}" />
                                        <x-jet-input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                     wire:model.defer="state.password" autocomplete="new-password" />
                                        <x-jet-input-error for="password" />
                                    </div>

                                    <div class="mb-3">
                                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                                        <x-jet-input id="password_confirmation" name="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                     wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                                        <x-jet-input-error for="password_confirmation" />
                                    </div>
                                    <input type="hidden" name="id" value="{{$user->id}}">




                                </div>
                                <x-jet-button class="justify-content-right mb-4">
                                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Cargando...</span>
                                    </div>

                                    {{ __('Guardar') }}
                                </x-jet-button>



                        </div>
                    </form>
                </div>
            </div>
        </div>



</x-app-layout>
