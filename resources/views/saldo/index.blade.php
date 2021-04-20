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
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i>Saldos</h5>
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-md-6">
                        <p class="h5" align="left"> Ingresos por facturas </p>
                    </div>
                    <div class="col-md-6">
                        <p class="h5" align="right">{{number_format($venta[0]->totalfac,2)}}</p>
                    </div>
                </div> --}}
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <p class="h5" align="left"> Ingresos por movimientos </p>
                    </div>
                    <div class="col-md-6">
                        <p class="h5" align="right">{{number_format($cuenta[0]->total,2)}}</p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <p class="h5" align="left"> Egresos por movimientos </p>
                    </div>
                    <div class="col-md-6">
                        <p class="h5" align="right">-{{number_format($cuenta2[0]->total2,2)}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p class="h5" align="left"> Total de saldo disponible </p>
                    </div>
                    <div class="col-md-6">
                        <p class="h5" align="right"><span class="h5">Saldo disponible: </span> {{number_format($cuenta[0]->total + {{-- $venta[0]->totalfac --}} - $cuenta2[0]->total2,2)}}</p>
                        {{-- <p class="h5" align="right">{{number_format($cuenta[0]->total + $venta[0]->totalfac - $cuenta2[0]->total2,2)}}</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection