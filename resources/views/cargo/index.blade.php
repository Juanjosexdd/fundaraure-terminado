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
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i> Listado cargo</h5>
                    @can('cargo.create')
                    <a class="btn btn-outline-success elevation-2 btn-md ml-auto rounded float-right" data-toggle="tooltip" data-placement="left" title="Agregar cargo" type="button" href="{{ route('cargo.create')}}">
                        <i class="fa fa-plus "></i>
                    </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                    {!!Form::open(array('url'=>'cargo','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">
                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    {{Form::close()}}
                    </div>
                </div>
                <table class="table table-hover rounded">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            @can('cargo.edit')
                            <th>Editar</th>
                            @endcan
                            @can('cargo.destroy')
                            <th>Cambiar Estado</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                       @foreach($cargos as $cargo)
                        <tr>
                            <td>{{$cargo->nombre}}</td>
                            <td>{{$cargo->descripcion}}</td>
                            <td>
                              @if($cargo->estatus=="1")
                                <span class="badge badge-success rounded"><i class="fa fa-check"></i> Activo</span>
                              @else
                                <span class="badge badge-danger rounded"><i class="fa fa-lock"></i> Inactvo</span>
                               @endif
                            </td>
                            @can('cargo.edit')
                            <td>
                                <a title="Editar" href="{{route('cargo.edit', $cargo->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn elevation-2 text-warning border-1 rounded btn-group" style="height: 32px; padding-bottom: 3px; border-right:0px; padding-top: 3px;"><i class="fa fa-edit fa-2x"></i></a>
                            </td>
                            @endcan
                            @can('cargo.destroy')
                            <td>
                               @if($cargo->estatus)
                                <button type="button" class="btn btn-danger btn-sm elevation-2 rounded" data-id="{{$cargo->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-times"></i> Desactivar
                                </button>
                                @else
                                <button type="button" class="btn btn-success btn-sm elevation-2 rounded" data-id="{{$cargo->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-check"></i> Activar
                                </button>
                                @endif
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$cargos->render()}}

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
                    <form action="{{route('cargo.destroy','test')}}" method="post" class="form-horizontal">
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