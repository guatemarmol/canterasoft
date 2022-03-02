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
                <!-- nombre -->
                <div class="mb-3">
                    <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                    <x-jet-input id="nombre" type="text" name="nombre" class="{{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ $user->nombre}}"  autocomplete="nombre" required/>
                    <x-jet-input-error for="nombre" />
                </div>

                <!-- Usuario -->
                 <div class="mb-3">
                    <x-jet-label for="usuario" value="{{ __('Usuario') }}" />
                    <x-jet-input id="usuario" type="text" name="usuario" class="{{ $errors->has('usuario') ? 'is-invalid' : '' }}" value="{{ $user->usuario}}"  autocomplete="usuario" required/>
                    <x-jet-input-error for="usuario" />
                </div>

                <!-- correo -->
                <div class="mb-3">
                    <x-jet-label for="correo" value="{{ __('Correo electronico') }}" />
                    <x-jet-input id="correo" type="email" name="correo" class="{{ $errors->has('correo') ? 'is-invalid' : '' }}" value="{{ $user->correo}}" required/>
                    <x-jet-input-error for="correo" />
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
                    @if ($user->lugarid == $value->id_lugar)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id_lugar }}" {{ $selected}}>
                       {{ $value->nombre_lugar}}
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
                    @if ($user->perfilid == $value->id_perfil)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id_perfil }}" {{ $selected }}>
                       {{ $value->tipo_perfil}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Equipo') }}" />

                <select id="equipo"  class="form-control" name="equipo" required>
                    <option value="0"  >
                        Seleccione Equipo
                    </option>
                    @foreach ($equipos as $value)
                    {{ $selected='' }}
                    @if ($user->equipoid == $value->id_equipos)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id_equipos }}" {{ $selected }}>
                       {{ $value->nombre_equipo}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Turno') }}" />

                <select id="turno"  class="form-control" name="turno" required>
                    <option value="0"  >
                        Seleccione Turno
                    </option>
                    @foreach ($turnos as $value)
                    {{ $selected='' }}
                    @if ($user->turnoid == $value->id_turno)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id_turno }}" {{ $selected }}>
                       {{ $value->nombre_turno}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <x-jet-label value="{{ __('Estado') }}" />

                <select id="estado"  class="form-control" name="estado" required>
                    <option value="0"  >
                        Seleccione Estado
                    </option>
                    @foreach ($estados as $value)
                    {{ $selected='' }}
                    @if ($user->estadoid == $value->id_estado)
                    {{$selected='selected' }}
                    @endif
                    <option value="{{ $value->id_estado }}" {{ $selected }}>
                       {{ $value->tipo_estado}}
                    </option>
                    @endforeach

                </select>
            </div>
            <input type="hidden" name="id" value="{{$user->id_usuario}}">
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

                        <x-jet-input class="{{ $errors->has('clave') ? 'is-invalid' : '' }}" type="password"
                                     name="clave" required autocomplete="new-password" />
                        <x-jet-input-error for="clave"></x-jet-input-error>
                    </div>

                    <div class="mb-3">
                        <x-jet-label value="{{ __('Confirmar Contraseña') }}" />

                        <x-jet-input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <input type="hidden" name="id" value="{{$user->id_usuario}}">
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
