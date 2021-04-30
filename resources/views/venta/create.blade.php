@extends('principal')
@section('contenido')


<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>

    <div class="container-fluid">
        @include('partials.message-session')

        <div class="row">
            <div class="col-12">
                <div class="card rounded elevation-2 pb-0">
                    <div class="card-header mailbox-controls">
                        <div class="row">
                            <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-warning"></i>  Agrega factura</h5>
                            <a class="btn btn-outline-warning elevation-2 btn-md ml-auto rounded float-right" type="button" href="{{ route('venta.index')}}">
                                <i class="fa fa-reply"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <form action="{{route('venta.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-md-3 offset-9">
                                    <div class="float-right">
                                        <h4><strong>Nro Fact: {{number_format($venta->num_venta+1)}}</strong></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 p-0">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="form-control-label col-sm-12" for="nombre">CLIENTE :</label>
                                        <div class="col-md-8">
                                            <select class="form-control selectpicker" name="id_cliente" id="id_cliente" data-live-search="true" required>
                                                <option value="0">SELECCIONE</option>
                                                @foreach($clientes as $client)
                                                <option value="{{$client->id}}">{{$client->cedula}} - {{$client->nombres}} {{$client->apellidos}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-success btn-block btn-sm rounded btn-sm elevation-2 " data-toggle="modal" data-target=".docs-example-modal-lg">
                                            <i class="fa fa-plus fa-2x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="num_venta" id="num_venta" value="{{$venta->num_venta+1}}">

                                <div class="col-md-3">
                                    <label class="form-control-label" style="text-transform:uppercase"for="nombre">Servicio :</label>
                                    <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true" required>
                                    <option value="0">SELECCIONE</option>
                                    @foreach($productos as $prod)
                                    <option value="{{$prod->id}}_{{$prod->precio_venta}}">{{$prod->producto}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label"style="text-transform:uppercase"  for="precio_venta">Precio Venta</label>
                                    <input type="number" disabled id="precio_venta" name="precio_venta" class="form-control" placeholder="Ingrese precio de venta"style="text-transform:uppercase" >
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="form-control-label" style="text-transform:uppercase" for="codformapago">Forma de pago :</label>
                                    <select class="form-control" name="codformapago" id="codformapago" required>
                                        <option value="0" disabled>SELECCIONE</option>
                                        @foreach($fpago as $fpag)
                                        <option value="{{$fpag->id}}">{{$fpag->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label" style="text-transform:uppercase" for="impuesto">Descuento (%):</label>
                                    <input type="text" id="descuento" name="descuento" class="form-control" placeholder="Ingrese el descuento" style="text-transform:uppercase">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label" style="text-transform:uppercase" for="cantidad">Cantidad :</label>
                                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}" style="text-transform:uppercase">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-control-label" for="">&nbsp;</label>

                                    <button type="button" id="agregar" class="btn btn-sm rounded btn-success btn-block elevation-2"><i class="fa fa-plus fa-2x"></i> Agregar detalle </button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row p-0">
                                <h5 class="card-title">&nbsp;&nbsp;&nbsp;Lista de servicios</h5>
                                <div class="table-responsive col-md-12">
                                    <table id="detalles" class="table  table-hover ">
                                        <thead>
                                            <tr class="bg-success">
                                                <th>Eliminar</th>
                                                <th>Servicio</th>
                                                <th>Precio Venta (Bs.)</th>
                                                <th>Descuento(%)</th>
                                                <th>Cantidad</th>
                                                <th>SubTotal (Bs.)</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th  colspan="5"><p align="right">TOTAL:</p></th>
                                                <th><p align="right"><span id="total">Bs. 0.00</span> </p></th>
                                            </tr>
                                            <tr>
                                                <th colspan="5"><p align="right">TOTAL IMPUESTO (16%):</p></th>
                                                <th><p align="right"><span id="total_impuesto">Bs. 0.00</span></p></th>
                                            </tr>
                                            <tr>
                                                <th  colspan="5"><p align="right">TOTAL PAGAR:</p></th>
                                                <th><p align="right"><span align="right" id="total_pagar_html">Bs. 0.00</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        </tbody>
                                    </table>
                              </div>
                            </div>
                            <div class="modal-footer form-group row" id="guardar">
                                <div class="col-md">
                                   <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <button type="submit" class="btn btn-block rounded btn-md elevation-2 btn-success"><i class="fa fa-save "></i> Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div><!--fin del div card body-->
                </div>
            </div>
        </div>
        <div class="modal fade docs-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('cliente.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}

                    <div class="form-group row">
                        <label for="cedula" style="text-transform:uppercase" class="col-sm-3 col-form-label">CEDULA :</label>
                        <div class="col-md-9">
                        <input class="form-control shadow-sm bg-light @error('cedula') is-invalid @enderror"
                            id="cedula"
                            type="text"
                            name="cedula"
                            placeholder="ESCRIBIE AQUI LA CEDULA/RIF..."
                            value="{{ old('cedula') }}"
                        >
                        @error('cedula')
                            <span class="invalid-feedback" role="alert">
                                <strong class="help-block">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            {{ Form::label('codtipocliente', 'TIPO CLIENTE :') }}
                        </div>
                        <div class="col-md-9">
                            {{ Form::select('codtipocliente', $tclientes, null, ['class' => 'form-control','placeholder' => ' ']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombres" style="text-transform:uppercase" class="col-sm-3 col-form-label">Nombres :</label>
                        <div class="col-md-9">
                        <input class="form-control shadow-sm bg-light @error('nombres') is-invalid @enderror"
                            id="nombres"
                            type="text"
                            name="nombres"
                            placeholder="Escribe aquí tu nombre..."
                            value="{{ old('nombres') }}"
                            style="text-transform:uppercase"
                        >
                        @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong class="help-block">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" style="text-transform:uppercase" class="col-sm-3 col-form-label">Apellidos :</label>
                        <div class="col-md-9">
                        <input class="form-control shadow-sm bg-light @error('apellidos') is-invalid @enderror"
                            id="apellidos"
                            type="text"
                            name="apellidos"
                            placeholder="Escribe aquí tu apellidos..."
                            value="{{ old('apellidos') }}"
                            style="text-transform:uppercase"
                        >
                        @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong class="help-block">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            {{ Form::label('codnacionalidad', 'NACIONALIDAD:') }}
                        </div>
                        <div class="col-md-9">
                            {{ Form::select('codnacionalidad', $nacionalidad, null, ['class' => 'form-control','placeholder' => ' ']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" style="text-transform:uppercase" class="col-sm-3 col-form-label">Dirección : </label>
                        <div class="col-md-9">
                        <input class="form-control shadow-sm bg-light @error('direccion') is-invalid @enderror"
                            id="direccion"
                            type="text"
                            name="direccion"
                            placeholder="Escribe aquí la dirección..."
                            value="{{ old('direccion') }}"
                            style="text-transform:uppercase"
                        >
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong class="help-block">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono"  style="text-transform:uppercase" class="col-sm-3 col-form-label">Telefono : </label>
                        <div class="col-md-9">
                        <input class="form-control shadow-sm bg-light @error('telefono') is-invalid @enderror"
                            id="telefono"
                            type="text"
                            name="telefono"
                            placeholder="Escribe aquí tu telefono..."
                            value="{{ old('telefono') }}"
                            style="text-transform:uppercase"
                        >
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong class="help-block">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" style="text-transform:uppercase" class="col-sm-3 col-form-label">Email :</label>
                        <div class="col-md-9">
                        <input class="form-control shadow-sm bg-light @error('email') is-invalid @enderror"
                            id="email"
                            type="text"
                            name="email"
                            autocomplete="off"
                            placeholder="Escribe aquí tu correo..."
                            value="{{ old('email') }}"
                            style="text-transform:uppercase"
                        >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="help-block">{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-success elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>

@push('scripts')
<script>

  $(document).ready(function(){
     $("#agregar").click(function(){
         agregar();
     });
  });

    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();
    $("#id_producto").change(mostrarValores);

     function mostrarValores(){

         datosProducto = document.getElementById('id_producto').value.split('_');
         $("#precio_venta").val(datosProducto[1]);

     }

     function agregar(){

         datosProducto = document.getElementById('id_producto').value.split('_');

         id_producto= datosProducto[0];
         producto= $("#id_producto option:selected").text();
         cantidad= $("#cantidad").val();
         descuento= $("#descuento").val();
         precio_venta= $("#precio_venta").val();
         impuesto=16;

          if(id_producto !="" && cantidad!="" && cantidad>0  && descuento!="" && precio_venta!=""){
            subtotal[cont]=(cantidad*precio_venta)-(cantidad*precio_venta*descuento/100);
            total= total+subtotal[cont];

            var fila= '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn rounded elevation-2 btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td> <td><input type="hidden" name="precio_venta[]" value="'+parseFloat(precio_venta).toFixed(2)+'">'+precio_venta+' </td> <td><input type="hidden" name="descuento[]" value="'+parseFloat(descuento).toFixed(0)+'">'+descuento+' </td> <td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+' </td> <td>'+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
                cont++;
                limpiar();
                totales();
                /*$("#total").html("Bs. " + total.toFixed(2));
                $("#total_venta").val(total.toFixed(2));*/
                evaluar();
                $('#detalles').append(fila);

            }else{

                //alert("Rellene todos los campos del detalle de la venta");

                Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Rellene todos los campos del detalle de la venta',

                })

            }

     }


     function limpiar(){

        $("#cantidad").val("");
        $("#descuento").val("0");
        $("#precio_venta").val("");

     }

     function totales(){

        $("#total").html("Bs. " + total.toFixed(2));
        //$("#total_venta").val(total.toFixed(2));

        total_impuesto=total*impuesto/100;
        total_pagar=total+total_impuesto;
        $("#total_impuesto").html("Bs. " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("Bs. " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
      }


     function evaluar(){

         if(total>0){

           $("#guardar").show();

         } else{

           $("#guardar").hide();
         }
     }

     function eliminar(index){

        total=total-subtotal[index];
        total_impuesto= total*20/100;
        total_pagar_html = total + total_impuesto;

        $("#total").html("Bs." + total);
        $("#total_impuesto").html("Bs." + total_impuesto);
        $("#total_pagar_html").html("Bs." + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));

        $("#fila" + index).remove();
        evaluar();
     }

</script>
@endpush

@endsection