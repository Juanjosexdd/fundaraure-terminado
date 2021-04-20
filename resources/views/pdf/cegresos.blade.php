<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <!-- <style>
        table {
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
            }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, 0.075);
            }
        .table-sm th,
        .table-sm td {
        padding: 0.3rem;
        }

        .table-bordered {
        border: 1px solid #dee2e6;
        }
    </style> -->
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
                        <td>Nombre</td>
                        <td>Descripción</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cegresos as $cegreso)
                    <tr>
                        <td>{{ $cegreso->nombre }}</td>
                        <td>{{ $cegreso->descripcion }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="/templete/dist/js/adminlte.js"></script>

</body>
</html>