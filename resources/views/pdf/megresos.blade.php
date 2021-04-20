<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
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

        .page-break {
            page-break-after: always;
        }
        .textreport{
            font-size: 12px;
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
            <table class="textreport table table-striped table-sm table-bordered p-0 text-sm">
                <thead>
                    <tr>
                        <td scope="col">Concepto</td>
                        <td>Cuenta</td>
                        <td>Monto</td>
                        <td>Observación</td>
                        <td>Responsable</td>
                        <td>Fecha</td>
                    </tr>
                </thead>
                <tbody class="textreport">
                    @foreach($megresos as $megreso)
                    <tr>
                        <td>{{$megreso->concepto}}</td>
                        <td>{{$megreso->cuenta}}</td>
                        <td>{{$megreso->monto}}</td>
                        <td>{{$megreso->observacion}}</td>
                        <td>{{$megreso->usuario}}</td>
                        <td>{{$megreso->created_at->format('d/m/Y') }}</td>
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