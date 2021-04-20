<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }


        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }

        #encabezado{
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
        }

        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        background:#D2691E;
        }

        section{
        clear: left;
        }

        #cliente{
        text-align: left;
        }

        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }

        #facliente thead{
        padding: 20px;
        background:#D2691E;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
        }

        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facvendedor thead{
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }

        #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }

        #facproducto thead{
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        }
        .text-center {
            text-align: center !important; }
        .text-left {
            text-align: left !important; }
        .text-right {
            text-align: right !important; }
        h5, .h5 {
            font-size: 1.25rem; }
        h3, .h3 {
            font-size: 1.75rem; }



    </style>
    <body>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">

        @foreach ($venta as $v)
        <header>
            <div class="row">
                <p align="right" class="h3"> <strong> N° Fact: {{$v->num_venta}}</strong></p>
                <p id="proveedor"> <strong> Nombre: {{$v->nombres}}<br>
                Apellido: {{$v->apellidos}}<br>
                Dirección: {{$v->direccion}}<br>
                Teléfono: {{$v->telefono}}<br>
                Email: {{$v->email}}</strong></p>
            </div>
        </header>

        @endforeach
        <section>
            <div>
                <table id="facproducto">
                    <thead>
                        <tr id="fa">
                            <th>CANTIDAD</th>
                            <th>SERVICIO</th>
                            <th>PRECIO(Bs.)</th>
                            <th>DESCUENTO (%)</th>
                            <th>SUBTOTAL (Bs.)</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($detalles as $det)
                        <tr>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->producto}}</td>
                            <td>{{$det->precio}}</td>
                            <td>{{$det->descuento}}</td>
                            <td>{{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,2)}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>

                        @foreach ($venta as $v)
                        <tr>
                           <th colspan="4"><p align="right">TOTAL:</p></th>
                           <td><p align="right">{{number_format($v->total,2)}}</p></td>
                        </tr>

                        <tr>
                            <th colspan="4"><p align="right">TOTAL IMPUESTO (16%):</p></th>
                            <td><p align="right">{{number_format($v->total*16/100,2)}}</p></td>
                        </tr>

                        <tr>
                            <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                            <td><p align="right">{{number_format($v->total+($v->total*16/100),2)}}</p></td>
                        </tr>
                        @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <!--puedes poner un mensaje aqui-->
            <div id="datos">
                {{-- <p id="encabezado">
                    <b>webtraining-it.com</b><br>JuanJosexD@gmail.com<br>Telefono: 0412 5205105<br> JuanJosexDD7@gmail.com
                </p>
 --}}            </div>
        </footer>
        </div>

    </body>
</html>