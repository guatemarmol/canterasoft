<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Consulta de Usuarios') }}
        </h2>
    </x-slot>

    <div class="row justify-content-center my-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 espacio">
    <div class="container-fluid">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>codigo</th>
                <th>Nombre</th>
                <th>correo electronico</th>
                <th>Area</th>
                <th>Perfil</th>
                <th>accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->departamento }}</td>
                    <td>{{ $usuario->perfil }}</td>
                    <td><a href="" class="btn btn-success">Editar</a>
                        </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{$users->links()}}

</div>
        </div>

</x-app-layout>
