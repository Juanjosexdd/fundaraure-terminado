<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Departamentos</title>
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <style>
        .col-md-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }
        .funda{
            color: #059edb;
        }
        .araure{
            color: #ed3a91;
        }
    </style>

</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="text-center text-uppercase"><span class="funda">fund</span><span class="araure">araure</span></h1>
                    <p class="text-center">Fundacion para el mejoramiento y  desarrollo del municipio araure</p>
                    <p class="text-center">Entre Av. 23 y 24 frente a la plaza bolivar Araure, Municipio Araure, Estado Portuguesa </p>
                </div>
            </div>
            <img class="img-fluid float-right fixed-top" style="height: 135px; width: 135px;" src="{{ asset('image/favicon1.png') }}" >
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class=" table table-striped table-sm table-bordered p-0 text-sm">
                <thead>
                    <tr>
                        <td>Cod</td>
                        <td>Nombre</td>
                        <td>Descipción</td>
                        <td>Estatus</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dptos as $dpto)
                    <tr>
                        <td>{{ $dpto->id }}</td>
                        <td>{{ $dpto->nombre }}</td>
                        <td>{{ $dpto->descripcion}}</td>
                        <td>
                            @if($dpto->estatus == '1')
                                <p>Activo</p>
                            @else
                                <p>Inactivo</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <p class="ml-right">{{$today}}</p>


<div class="page-break"></div>

<script src="/templete/dist/js/adminlte.js"></script>
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
</body>
</html>