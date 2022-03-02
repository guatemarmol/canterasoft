<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            <i class="fa fa-user"></i>  {{ __('Consulta de Usuarios') }} <a href="{{ route('create')}}"><i class="fa fa-user-plus" ></i></a>
        </h2>
    </x-slot>

    <div class="row justify-content-center my-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
    <div class="container-fluid">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" data-toggle="table" data-search="true">
            <thead>
            <tr>
                <th>codigo</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>correo electronico</th>
                <th>Area</th>
                <th>Perfil</th>
                <th>accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $usuario)
                <tr>
                    <td>{{ $usuario->id_usuario }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->usuario }}</td>
                    <td>{{ $usuario->correo }}</td>
                    <td>{{ $usuario->department_name }}</td>
                    <td>{{ $usuario->profile_name }}</td>
                    <td>
                        <a class="justify-content-left mb-4" href="{{ route('editar',[ 'id' => $usuario->id_usuario]) }}">
                            <i class="fa fa-edit"></i>
                          </a>
                          <form method="POST" action="/consulta" class="justify-content-left mb-4" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{$usuario->id_usuario}}">
                            <input class="fa-regular" value="&#xf2ed;" style="border:none;background-color: transparent;" type="submit">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        {{$users->links()}}

</div>
        </div>

</x-app-layout>
