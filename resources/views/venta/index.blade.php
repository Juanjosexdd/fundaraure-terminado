@extends('principal')
@section('contenido')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
    <div class="container-fluid">
        @include('partials.message-session')
        <div class="card elevation-2">
            <div class="card-header ">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i>  Listado de ventas</h5>
                    <div class="btn-group ml-auto" role="group" aria-label="Basic example">
                        @can('venta.create')
                        <a type="button" class="btn btn-outline-success elevation-2 btn-md rounded float-right" title="Agregar Factura" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('venta.create')}}">
                            <i class="fa fa-plus"></i>
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                    {!! Form::open(array('url'=>'venta','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                        <div class="input-group">
                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    {{Form::close()}}
                    </div>
                </div>
                <div class="row">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                @can('venta.show')
                                <th>Ver Factura</th>
                                @endcan
                                <th>N°Fact</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Vendedor</th>
                                <th>Total(Bs.)</th>
                                <th>IVA(%)</th>
                                <th>F/P</th>
                                <th>Estatus</th>
                                @can('venta.destroy')
                                <th>Anular</th>
                                @endcan
                                @can('venta.pdf')
                                <th>Descargar factura</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                            @foreach($ventas as $vent)
                            <tr>
                                @can('venta.show')
                                <td>
                                    <a href="{{URL::action('VentaController@show',$vent->id)}}">
                                        <button type="button" class="btn btn-warning btn-md rounded elevation-2 btn-sm">
                                            <i class="fa fa-eye fa-1x"></i> Ver factura
                                        </button> &nbsp;
                                    </a>
                                </td>
                                @endcan
                                <td>{{$vent->num_venta}}</td>
                                <td>{{$vent->created_at->format('d/m/Y') }}</td>
                                <td>{{$vent->cliente}} - {{$vent->acliente}}</td>
                                <td>{{$vent->nombre}}</td>
                                <td>{{number_format($vent->total,2)}}</td>
                                <td>
                                    @if($vent->impuesto=="0.16")
                                        <span>16%</span>
                                    @else
                                        {{$vent->impuesto}}
                                    @endif
                                </td>
                                <td>{{$vent->formapagoss}}</td>
                                <td>
                                  @if($vent->estado=="Procesado")
                                    <span class="badge badge-success rounded"><i class="fa fa-check"></i> Procesado</span>
                                  @else
                                    <span class="badge badge-danger rounded"><i class="fa fa-check"></i> Anulado</span>
                                   @endif
                                </td>
                                @can('venta.destroy')
                                <td>
                                   @if($vent->estado=="Procesado")
                                    <button type="button" class="btn btn-danger elevation-2 btn-sm rounded" data-id_venta="{{$vent->id}}" data-toggle="modal" data-target="#cambiarEstadoVenta">
                                        <i class="fa fa-times fa-1x "></i> Anular
                                    </button>
                                    @else
                                     <button type="button" class="btn btn-success btn-sm rounded">
                                        <i class="fa fa-lock fa-1x"></i> Anulado
                                    </button>
                                    @endif
                                </td>
                                @endcan
                                @can('venta.pdf')
                                <td>
                                    <a href="{{url('pdfVenta',$vent->id)}}" target="_blank">
                                       <button type="button" class="btn btn-info btn-sm rounded elevation-2">
                                         <i class="fa fa-file fa-1x"></i> Descargar PDF
                                       </button> &nbsp;
                                    </a>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$ventas->render()}}
            </div>
        </div>
    </div>
    <!-- Inicio del modal cambiar estado de venta -->
    <div class="modal fade" id="cambiarEstadoVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cambiar Estado de Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{route('venta.destroy','test')}}" method="POST">
                  {{method_field('delete')}}
                  {{csrf_field()}}
                    <input type="hidden" id="id_venta" name="id_venta" value="">
                    <p>Estas seguro de cambiar el estado?</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection