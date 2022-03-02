<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            <i class="fa fa-address-card"></i>  {{ __('Consulta de Perfiles') }} <a href="{{ route('createPerfil')}}"><i class="fa fa-plus"></i></a>
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
                <th>Descripcion</th>
                <th>Fecha Creacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perfiles as $perfil)
                <tr>
                    <td>{{ $perfil->id_perfil }}</td>
                    <td>{{ $perfil->tipo_perfil }}</td>
                    <td>{{ $perfil->descripcion_perfil }}</td>
                    <td>{{ $perfil->fecha_crea }}</td>
                    <td>
                        <a class="justify-content-left mb-4" href="{{ route('editarPerfil',[ 'id' => $perfil->id_perfil]) }}">
                            <i class="fa fa-edit"></i>
                          </a>
                          <form method="POST" action="/consulta-perfil" class="justify-content-left mb-4" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{$perfil->id_perfil}}">
                            <input class="fa-regular" value="&#xf2ed;" style="border:none;background-color: transparent;" type="submit">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        </div>
        {{$perfiles->links()}}

</div>
        </div>

</x-app-layout>
