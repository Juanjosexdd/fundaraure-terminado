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
        <div class="card rounded p-0 elevation-2">
            <div class="card-header mailbox-controls">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-file-pdf-o text-danger"></i>  Reportes</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-10 offset-1">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="cliente-tab" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="true">Clientes</a>
                      </li>
                      <li class="nav-item rounded" role="presentation">
                        <a class="nav-link rounded" id="movimientos-tab" data-toggle="tab" href="#movimientos" role="tab" aria-controls="movimientos" aria-selected="false">Movimientos</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="facturacion-tab" data-toggle="tab" href="#facturacion" role="tab" aria-controls="facturacion" aria-selected="false">Facturas</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="servicios-tab" data-toggle="tab" href="#servicios" role="tab" aria-controls="servicios" aria-selected="false">Servicios</a>
                      </li>
                      {{-- <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dpto-tab" data-toggle="tab" href="#dpto" role="tab" aria-controls="dpto" aria-selected="false">Departamento</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="cargo-tab" data-toggle="tab" href="#cargo" role="tab" aria-controls="cargo" aria-selected="false">Cargo</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="concepto-tab" data-toggle="tab" href="#concepto" role="tab" aria-controls="concepto" aria-selected="false">Conceptos</a>
                      </li> --}}
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Usuarios</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="cliente" role="tabpanel" aria-labelledby="cliente-tab">
                        <div class="container">

                          <form class="" action="{{ route('cliente.pdf') }}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <hr class="col-md-8 offset-2">
                            <div class="form-group row">
                                <div class="col-md-8 offset-2">
                                    {{ Form::label('codtipocliente', 'TIPO DE CLIENTE :') }}
                                    {{ Form::select('codtipocliente', $tclientes, null,  ['class' => 'form-control','placeholder' => ' ']) }}
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" > BUSCAR </button>
                          </form>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="movimientos" role="tabpanel" aria-labelledby="movimientos-tab">
                        <div class="container">
                          <form class="" action="{{route('megresos.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <hr class="col-md-8 offset-2">
                            <div class="form-group row">
                                <div class="col-md-4 offset-2">
                                    {{ Form::label('cuentapote', 'TIPO DE CUENTA:') }}
                                    {{ Form::select('cuentapote', $cuentapote, null,  ['class' => 'form-control','placeholder' => ' ']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('codconcepto', 'CONCEPTO:') }}
                                    {{ Form::select('codconcepto', $conceptos, null, ['class' => 'form-control','placeholder' => ' ']) }}
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >Buscar </button>
                          </form>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="facturacion" role="tabpanel" aria-labelledby="facturacion-tab">
                        <div class="container">
                          <form class="" action="{{route('ventas.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" id="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" id="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 offset-2">
                                    {{ Form::label('idusuario', 'Usuario:') }}
                                    {{ Form::select('idusuario', $users, null,  ['class' => 'form-control','placeholder' => ' ']) }}
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('idcliente', 'Paciente:') }}
                                    {{ Form::select('idcliente', $cliente, null,  ['class' => 'form-control','placeholder' => ' ']) }}
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >BUSCAR </button>
                          </form>
                        </div>
                       </div>
                       <div class="tab-pane fade" id="servicios" role="tabpanel" aria-labelledby="servicios-tab">
                            <div class="container">
                          <form class="" action="{{route('producto.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >BUSCAR </button>
                          </form>
                            </div>
                       </div>
                       <div class="tab-pane fade" id="dpto" role="tabpanel" aria-labelledby="dpto-tab">
                            <div class="container">
                          <form class="" action="{{route('dptos.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >BUSCAR </button>
                          </form>
                            </div>
                       </div>
                       <div class="tab-pane fade" id="cargo" role="tabpanel" aria-labelledby="cargo-tab">
                            <div class="container">
                          <form class="" action="{{route('cargos.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >BUSCAR </button>
                          </form>
                            </div>
                       </div>
                       <div class="tab-pane fade" id="concepto" role="tabpanel" aria-labelledby="concepto-tab">
                            <div class="container">
                          <form class="" action="{{route('conceptos.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >BUSCAR </button>
                          </form>
                            </div>
                       </div>
                       <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                            <div class="container">
                          <form class="" action="{{route('users.pdf')}}">
                            <label class="h4 offset-4">Selercciona el rango de fecha:</label>
                            <div class="row">
                                <br>
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <label>Desde: </label>
                                        <input class="form-control mr-sm-2" name="desde" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hasta: </label>
                                        <input class="form-control mr-sm-2" name="hasta" type="date" placeholder="Search" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                            <button target="_blank" class="btn elevation-2 btn-outline-success my-2 my-sm-0 btn-sm rounded btn-block col-md-8 offset-2" title="Generar reporte" type="submit" >BUSCAR </button>
                          </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection