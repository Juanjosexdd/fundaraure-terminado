@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
            </ol>
            <div class="container-fluid">
                @include('partials.message-session')
                <!-- Ejemplo de tabla Listado -->
                <div class="card rounded elevation-2">
                    <div class="card-header margin-bottom-0">
                        <div class="row">
                            <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i> Listado de Concepto ingresos</h5>
                            <div class="btn-group ml-auto" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-outline-success elevation-2 btn-md rounded float-right" title="Agregar Ingreso" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('cingresos.create')}}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                &nbsp;
                                <a type="button" href="{{ route('cingresos.pdf') }}" target="_blank" title="Generar reporte" data-toggle="tooltip" data-placement="top" class="btn btn-outline-success elevation-2 btn-md rounded float-right"><i class="fa fa-file-pdf-o"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {!!Form::open(array('url'=>'cingreso','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                                <div class="input-group">
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr class="">
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                    <th>Cambiar Estado</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                               @foreach($cingresos as $cingreso)
                                <tr>
                                    <td>{{$cingreso->nombre}}</td>
                                    <td>{{$cingreso->descripcion}}</td>
                                    <td>
                                      @if($cingreso->estatus=="1")
                                        <span class="badge badge-success rounded"><i class="fa fa-check "></i> Activo</span>
                                      @else
                                        <span class="badge badge-danger rounded"><i class="fa fa-lock "></i> Inactvo</span>
                                       @endif
                                    </td>
                                    <td>
                                        <a title="Editar" href="{{route('cingresos.edit', $cingreso->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn text-warning rounded elevation-2 btn-group" style="height: 32px; padding-bottom: 3px; border-right:0px; padding-top: 3px;"><i class="fa fa-edit fa-2x"></i></a>
                                    </td>
                                    <td>
                                       @if($cingreso->estatus)
                                        <button type="button" class="btn btn-danger elevation-2 btn-sm rounded" data-id="{{$cingreso->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-times fa-1x"></i> Desactivar
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-success elevation-2 btn-sm rounded" data-id="{{$cingreso->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-check fa-1x"></i> Activar
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$cingresos->render()}}
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>

             <!--Inicio del modal Cambiar Estado-->
             <div class="modal fade rounded" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg rounded" role="document">
                    <div class="modal-content">
                        <div class="modal-header rounded">
                            <h5 class="modal-title">Cambiar Estado del servicio</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('cingresos.destroy','test')}}" method="post" class="form-horizontal">
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