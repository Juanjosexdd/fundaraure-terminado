@extends('principal')
@section('contenido')
<main class="main">
	 <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card rounded">
            <div class="card-header">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-edit text-warning"></i>  Crear tipo cliente</h5>
                    <a class="btn btn-outline-warning elevation-2 btn-md ml-auto rounded float-right"  title="Volver" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('tcliente.index')}}">
                    <i class="fa fa-reply text-warning"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('tcliente.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @include('tcliente.form')
                    </form>
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
</main>

@endsection