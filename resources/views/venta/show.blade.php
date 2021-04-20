@extends('principal')
@section('contenido')


<main class="main">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
  </ol>

  <div class="container-fluid">
    <div class="card rounded elevation-2 p-3">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 offset-4">
            <h2 class="text-center">FACTURA</h2>
          </div>
          <div class="col-md-4">
              <label class="form-control-label" for="">&nbsp;</label>
              <br>
              <div class="float-right">
                  @can('venta.pdf')
                  <a class=" ml-auto" href="{{url('pdfVenta',$venta->id)}}" target="_blank">
                    <button type="button" class="btn btn-success btn-sm ml-auto rounded elevation-2">
                    <i class="fa fa-file fa-1x"></i> Descargar PDF
                    </button> &nbsp;
                  </a>
                  @endcan
                  <br>
                  <p><h4><strong>Nro Fact: {{$venta->num_venta}}</strong></h4></p>
              </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <h5 class="form-control-label" for="nombre"></h5>
            <p></p>
            <p><strong>NOMBRE :</strong> {{$venta->nombres}} {{$venta->apellidos}}</p>
            <p><strong>CEDULA :</strong> {{$venta->cedula}}</p>
            <p><strong>DIRECCION : </strong>{{$venta->direccion}} </p>
          </div>
          <div class="col-md-6">

          </div>
        </div>

        <div class="form-group row ">
          <h3>&nbsp;&nbsp;Detalle de Ventas</h3>
          <div class="table-responsive col-md-12">
            <table id="detalles" class="table  table-hover ">
              <thead>
                  <tr class="bg-success">
                  <th>Servicio</th>
                  <th>Precio Venta(Bs.)</th>
                  <th>Descuento(%)</th>
                  <th>Cantidad</th>
                  <th>SubTotal(Bs.)</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th  colspan="4"><p align="right">TOTAL:</p></th>
                  <th><p align="right">{{number_format($venta->total,2)}}</p></th>
                </tr>
                <tr>
                  <th colspan="4"><p align="right">IVA (16%):</p></th>
                  <th><p align="right">{{number_format($venta->total*16/100,2)}}</p></th>
                </tr>
                <tr>
                  <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                  <th><p align="right">{{number_format($venta->total+($venta->total*16/100),2)}}</p></th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($detalles as $det)
                <tr>
                  <td>{{$det->producto}}</td>
                  <td>{{$det->precio}}</td>
                  <td>{{$det->descuento}}</td>
                  <td>{{$det->cantidad}}</td>
                  <td>{{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,2)}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection