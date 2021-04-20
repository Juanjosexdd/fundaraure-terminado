@extends('principal')
@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
    <div class="container-fluid">
        @include('partials.message-session')
        <div class="card elevation-2">
            <div class="card-header">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i>  Listado cliente</h5>
                    <div class="btn-group ml-auto" role="group" aria-label="Basic example">
                        @can('cliente.create')
                        <a type="button" class="btn btn-outline-success elevation-2 btn-md rounded float-right" title="Agregar cliente" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('cliente.create')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        @endcan
                        &nbsp;
                        @can('cliente.pdf')
                        <a type="button" href="{{ route('cliente.pdf') }}" target="_blank" title="Generar reporte" data-toggle="tooltip" data-placement="top" class="btn btn-outline-warning elevation-2 btn-md rounded float-right"><i class="fa fa-file-pdf-o"></i></a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'cliente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                            <div class="input-group">
                                <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-hover table-lg">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Cliente</th>
                            <th>Tipo cliente</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            @can('cliente.edit')
                            <th>Editar</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                       @foreach($clientes as $client)
                        <tr>
                            <td>{{$client->nacionalidad}} - {{$client->cedula}}</td>
                            <td>{{$client->nombres}} - {{$client->apellidos}}</td>
                            <td>{{$client->tipocliente}}</td>
                            <td>{{$client->telefono}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->direccion}}</td>
                            @can('cliente.edit')
                            <td>
                                <a title="Editar" href="{{route('cliente.edit', $client->id)}}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn text-warning border-1 rounded btn-group elevation-2" style="height: 32px; padding-bottom: 3px; border-right:0px; padding-top: 3px;"><i class="fa fa-edit fa-2x"></i> </a>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="float-right">{{$clientes->render()}}</span>
            </div>
        </div>
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('cliente.store')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        @include('cliente.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection