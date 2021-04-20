@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        @include('partials.message-session')

        <div class="card rounded elevation-2">
            <div class="card-header margin-bottom-0">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i> Datos Empresa</h5>
                    @can('empresa.create')
                    <a class="btn btn-outline-success elevation-2 btn-md ml-auto rounded float-right" data-toggle="tooltip" data-placement="left" title="Agregar empresa" type="button" href="{{ route('empresa.create')}}">
                        <i class="fa fa-plus "></i>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover rounded">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rif</th>
                            <th>Direccion</th>
                            <th>Descripción</th>
                            <th>Logo</th>
                            @can('empresa.edit')
                            <th>Editar</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($empresas as $empresa)
                        <tr>
                            <td>{{$empresa->nombre}}</td>
                            <td>{{$empresa->rif}}</td>
                            <td>{{$empresa->direccion}}</td>
                            <td>{{$empresa->descripcion}}</td>
                            <td><img src="{{$empresa->file}}" class="img-avatar" class="img-avatar" style="width: 80px; height: 80px">
                            </td>
                            @can('empresa.edit')
                            <td>
                                <a title="Editar" href="{{route('empresa.edit', $empresa->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn text-warning border-1 rounded btn-group" style="height: 32px; padding-bottom: 3px; border-right:0px; padding-top: 3px;"><i class="fa fa-edit fa-2x"></i></a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$empresas->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
     <!--Inicio del modal Cambiar Estado-->
        <div class="modal fade rounded" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg rounded" role="document">
            <div class="modal-content">
                <div class="modal-header rounded">
                    <h5 class="modal-title">Cambiar Estado del cargo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('empresa.destroy','test')}}" method="post" class="form-horizontal">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id" value="">
                        <p class="docs-title">Estas seguro de cambiar el estado?</p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success bnt-sm rounded"><i class="fa fa-lock fa-1x"></i> Aceptar</button>
                            <br>
                            <button type="button" class="btn btn-outline-danger btn-sm rounded" data-dismiss="modal"><i class="fa fa-times fa-1x"></i> Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection