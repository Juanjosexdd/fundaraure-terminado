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
                <div class="card rounded p-0 elevation-2">
                    <div class="card-header mailbox-controls">
                        <div class="row">
                            <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i>  Listado de Usuarios</h5>
                            <div class="btn-group ml-auto" role="group" aria-label="Basic example">
                                @can('user.create')
                                <a type="button" class="btn btn-outline-success elevation-2 btn-md rounded float-right" title="Agregar usuario" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('user.create')}}">
                                    <i class="fa fa-plus"></i>
                                </a>
                                @endcan
                                &nbsp;
                                @can('user.pdf')
                                <a type="button" href="{{ route('users.pdf') }}" target="_blank" title="Generar reporte" data-toggle="tooltip" data-placement="top" class="btn btn-outline-warning elevation-2 btn-md rounded float-right"><i class="fa fa-file-pdf-o bold"></i></a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {!!Form::open(array('url'=>'user','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                                <div class="input-group">
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn  btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    {{-- <th>Ver</th> --}}
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Departamento</th>
                                    <th>Cargo</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>Ver</th>
                                    {{-- @can('user.edit')
                                    <th>Editar</th>
                                    @endcan --}}
                                    @can('user.destroy')
                                    <th>Cambiar Estado</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody style="font-size: 12px;">
                               @foreach($users as $user)
                                <tr>
                                    {{-- <td>
                                        <a title="Editar" href="{{route('user.show', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn text-warning rounded btn-group elevation-2" style="height: 32px; padding-bottom: 1px;  padding-top: 3px;"><i class="fa fa-eye fa-2x"></i></a>
                                    </td> --}}
                                    <td>{{$user->nacionalidad}}-{{$user->cedula}}</td>
                                    <td>{{$user->nombre}} - {{$user->apellido}}</td>
                                    <td>{{$user->dpto}}</td>
                                    <td>{{$user->cargo}}</td>
                                    <td>{{$user->direccion}}</td>
                                    <td>{{$user->telefono}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->usuario}}</td>
                                    <td>
                                      @if($user->condicion=="1")
                                        <span class="badge badge-success rounded"><i class="fa fa-check "></i> Activo</span>
                                      @else
                                        <span class="badge badge-danger rounded"><i class="fa fa-lock "></i> Inactvo</span>
                                       @endif
                                    </td>
                                    <td>
                                        <a title="Ver" href="{{route('user.show', $user->id)}}" class="btn btn-sm text-warning rounded btn-group elevation-2"><i class="fa fa-eye text-aqua"></i></a>
                                    </td>
                                    {{-- @can('user.edit')
                                    <td>
                                        <a title="Editar" href="{{route('user.edit', $user->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn text-warning rounded btn-group elevation-2" style="height: 32px; padding-bottom: 1px;  padding-top: 3px;"><i class="fa fa-edit fa-2x"></i></a>
                                    </td>
                                    @endcan --}}
                                    @can('user.destroy')
                                    <td>
                                       @if($user->condicion)
                                        <button type="button" class="rounded elevation-2 btn rounded btn-danger rounded btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-times "></i> Desactivar
                                        </button>

                                        @else
                                         <button type="button" class="btn btn-success elevation-2 rounded btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-check "></i> Activar
                                        </button>
                                        @endif
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$users->render()}}
                    </div>
                </div>
            </div>
             <!-- Inicio del modal Cambiar Estado del usuario -->
             <div class="modal fade modal-dialog-centered rounded" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered rounded" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cambiar Estado del Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('user.destroy','test')}}" method="POST">
                             {{method_field('delete')}}
                             {{csrf_field()}}
                                <input type="hidden" id="id_usuario" name="id_usuario" value="">
                                <p>Estas seguro de cambiar el estado?</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn rounded btn-danger" data-dismiss="modal"><i class="fa fa-times "></i>Cerrar</button>
                                    <button type="submit" class="btn rounded btn-success"><i class="fa fa-lock "></i>Aceptar</button>
                                </div>
                             </form>
                        </div>
                   </div>
             </div>
        </main>
@endsection