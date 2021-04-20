@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
            </ol>

			<div class="row ml-1 mr-1">
                @can('venta.index')
	            <div class="col-lg-4 col-xs-4">
	                <div class="card bg-success shadow rounded py-3 px-4 border-0 elevation-2">
	                    <div class="card-body pb-0">
	                        <button class="btn btn-transparent p-0 float-right" type="button">
	                        <i class="fa fa-suitcase text-warning fa-2x"></i>
	                        </button>
	                        <div class="text-value"><strong>Bs. {{$ventasmes[0]->totalmes}} (MES ACTUAL) </strong></div>
	                        <div class="h4">Total ventas</div>
	                    </div>
	                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
	                        <a href="{{url('venta')}}" class="small-box-footer h4">Ventas <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                </div>
	            </div>
                @endcan
                @can('megresos.index')
	            <div class="col-lg-4 col-xs-4">
	                <div class="card bg-danger shadow rounded py-3 px-4 border-0 elevation-2">
	                    <div class="card-body pb-0">
	                        <button class="btn btn-transparent p-0 float-right" type="button">
	                        <i class="fa fa-suitcase text-warning fa-2x"></i>
	                        </button>
	                        <div class="text-value"><strong>Bs. -{{number_format($cuenta2[0]->total2,2)}}</strong></div>
	                        <div class="h4">Total de gastos</div>
	                    </div>
	                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
	                        <a href="{{url('megresos')}}" class="small-box-footer h4">Movimientos <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                </div>
	            </div>
                @endcan
                @can('saldo.index')
	            <div class="col-lg-4 col-xs-4">
	                <div class="card bg-success shadow rounded py-3 px-4 border-0 elevation-2">
	                    <div class="card-body pb-0">
	                        <button class="btn btn-transparent p-0 float-right" type="button">
	                        <i class="fa fa-suitcase text-warning fa-2x"></i>
	                        </button>
	                        <div class="text-value"><strong>Bs. {{number_format($cuenta[0]->total - $cuenta2[0]->total2,2)}}</strong></div>
	                        <div class="h4">Saldo disponible</div>
	                    </div>
	                    <div class="chart-wrapper mt-3 mx-3" style="height:35px;">
	                        <a href="{{url('saldo')}}" class="small-box-footer h4">Saldo <i class="fa fa-arrow-circle-right"></i></a>
	                    </div>
	                </div>
                    @endcan
	            </div>
        	</div>
            @can('megresos.index')
            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="text-center">Ventas</h4>
                    </div>
                    <div class="card-content">
                        <div class="ct-chart">
                            <canvas id="ventas">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </div>

</main>

@endsection
@section('script')
<script src="{{asset('js/Chart.min.js')}}"></script>


<script>
$(function () {
    var varVenta=document.getElementById('ventas').getContext('2d');
    var charVenta = new Chart(varVenta, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($ventasmes as $reg)
        {
            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
            $mes_traducido=strftime('%B',strtotime($reg->mes));

            echo '"'. $mes_traducido.'",';} ?>],
            datasets: [{
                label: 'Ventas',
                data: [<?php foreach ($ventasmes as $reg)
                {echo ''. $reg->totalmes.',';} ?>],
                backgroundColor: 'rgba(195, 155, 211, 1)',
                borderColor: 'rgba(118, 215, 196, 1)',
                pointBackgroundColor:'rgba(118, 215, 196, 1)' ,
                pointBorderColor:'rgba(244, 208, 63, 1)' ,
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});
</script>
@endsection

