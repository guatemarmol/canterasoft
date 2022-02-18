<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>
    <div>
    <x-jet-form-profile-edit submit="actualizarPerfil">
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
                    <x-jet-input id="name" type="text" name="name" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $user->name}}"  autocomplete="name" required/>
                    <x-jet-input-error for="name" />
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" name="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ $user->email}}" required/>
                    <x-jet-input-error for="email" />
                </div>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Departamento') }}" />

                <select id="departamento"  class="form-control" name="departamento" required>
                    <option value=""  >
                        Seleccione Departamento
                    </option>
                    @foreach ($departments as $value)
                    {{ $selected='' }}
                    @if ($user->departamento == $value->id)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id }}" {{ $selected}}>
                       {{ $value->name}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Perfil') }}" />

                <select id="perfil"  class="form-control" name="perfil" required>
                    <option value="0"  >
                        Seleccione Perfil
                    </option>
                    @foreach ($profiles as $value)
                    {{ $selected='' }}
                    @if ($user->perfil == $value->id)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id }}" {{ $selected }}>
                       {{ $value->name}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Estado') }}" />

                <select id="estado"  class="form-control" name="estado" required>
                    {{ $selected1='' }} {{ $selected='' }} {{ $selected2='' }}
                    <option value=""  >
                        Seleccione Estado
                    </option>
                    @if( $user->status == 'A' )
                    {{$selected='selected' }}
                    @elseif ( $user->status == 'B' )
                    {{$selected1='selected' }}
                    @elseif ( $user->status == 'N' )
                    {{$selected2='selected' }}
                    @endif
                    <option value="A"  {{ $selected}}>
                        Activo
                    </option>
                    <option value="N" {{ $selected2}} >
                        Inactivo
                    </option>
                    <option value="B" {{ $selected1}}>
                        Bloqueado
                    </option>

                </select>
            </div>
            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="tipo" value="profile">

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

    <x-jet-section-border />
    <div>
        <x-jet-form-profile-edit submit="actualizarPerfil">
            <x-slot name="title">
                {{ __('Cambiar Contraseña') }}
            </x-slot>

            <x-slot name="description">
                {{ __('Asegúrese de que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.') }}
            </x-slot>

            <x-slot name="form">
                <div class="w-md-75">
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
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="hidden" name="tipo" value="password">
                </div>
            </x-slot>

            <x-slot name="actions">
                <x-jet-button>
                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>

                    {{ __('Guardar') }}
                </x-jet-button>
            </x-slot>
        </x-jet-form-section>

</x-app-layout>
