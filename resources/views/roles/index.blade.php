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
            <div class="card-header mailbox-controls">
                <div class="row">
                    <h5 class="card-title"><i class="fa fa-list text-success"></i>  Listado de roles</h5>
                    <a class="btn btn-outline-success elevation-2 btn-md ml-auto rounded float-right" data-toggle="tooltip" data-placement="left" title="Agregar servicio" type="button" href="{{ route('roles.create')}}"><i class="fa fa-plus "></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                    {!!Form::open(array('url'=>'roles','method'=>'GET','autocomplete'=>'off','rol'=>'search'))!!}
                        <div class="input-group">
                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    {{Form::close()}}
                    </div>
                </div>
                <table class="table  table-hover table-lg">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>slug</th>
                            <th>Descripción</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                       @foreach($rol as $rols)
                        <tr>
                            <td>{{$rols->name}}</td>
                            <td>{{$rols->slug}}</td>
                            <td>{{$rols->description}}</td>

                            <td>
                                <a title="Editar" href="{{route('roles.edit', $rols->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn text-warning border-1 rounded elevation-2 btn-group" style="height: 32px; padding-bottom: 3px; border-right:0px; padding-top: 3px;"><i class="fa fa-edit fa-2x"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$rol->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Cargo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('cargo.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('cargo.form')
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
     <!--Inicio del modal actualizar-->
    <div class="modal fade" id="abrirmodalEditarCargo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg rounded" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Actualizar Cargo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('cargo.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{method_field('patch')}}
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id" value="">
                        @include('cargo.form')
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
     <!--Inicio del modal Cambiar Estado-->
    <div class="modal fade rounded" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg rounded" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success rounded">
                    <h5 class="modal-title">Cambiar Estado del servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('cargo.destroy','test')}}" method="post" class="form-horizontal">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id" value="">
                        <h4>Estas seguro de cambiar el estado?</h4>
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