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
                            <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i> Listado de movimientos</h5>
                            @can('megresos.create')
                            <a class="btn btn-outline-success elevation-2 btn-md ml-auto rounded float-right" data-toggle="tooltip" data-placement="left" title="Agregar Egreso" type="button" href="{{ route('megresos.create')}}">
                                <i class="fa fa-plus "></i>
                            </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {!!Form::open(array('url'=>'megreso','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                                <div class="input-group">
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                            <div class="col-md-6">

                                <p class="h5" align="right"><span class="h5">Saldo disponible: </span> {{number_format($cuenta[0]->total + {{-- $venta[0]->totalfac --}} - $cuenta2[0]->total2,2)}}</p>

                            </div>
                        </div>
                        <table class="table table-hover table-lg">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Concepto</th>
                                    {{-- <th>Cuenta</th> --}}
                                    <th>Ingreso</th>
                                    <th>Egreso</th>
                                    <th>Observación</th>
                                    <th>Responsable</th>
                                    {{-- <th>Editar</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($megresos as $megreso)
                                <tr>
                                    <td>{{$megreso->created_at->format('d/m/Y') }}</td>
                                    <td>{{$megreso->concepto}}</td>
                                    {{-- <td>
                                        @if($megreso->cuenta=="INGRESOS")
                                            <span class="badge badge-success rounded">{{$megreso->cuenta}}</span>
                                        @else
                                            <span class="badge badge-danger rounded">{{$megreso->cuenta}}</span>
                                        @endif
                                    </td> --}}
                                    <td>
                                        @if($megreso->cuenta=="INGRESOS")
                                            <span class="text-success"> +{{number_format($megreso->monto,2)}}</span>
                                        @else
                                            <span class="badge badge-danger rounded"></span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($megreso->cuenta=="EGRESOS")
                                            <span class="text-danger"> -{{number_format($megreso->monto,2)}}</span>
                                        @else
                                            <span class="badge badge-danger rounded"></span>
                                        @endif
                                    </td>
                                    <td>{{$megreso->observacion}}</td>
                                    <td>{{$megreso->usuario}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-5">
                                {{$megresos->render()}}
                            </div>
                            {{-- <div class="col-md-6">
                                <p class="h5" align="right"><span class="h5">Total de saldo disponible: </span> {{number_format($cuenta[0]->total + $venta[0]->totalfac - $cuenta2[0]->total2,2)}}</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection