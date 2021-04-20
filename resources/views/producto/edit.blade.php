@extends('principal')
@section('contenido')
<main class="main">
	 <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
    <div class="container-fluid">
        <div class="card rounded elevation-2">
            <div class="card-header margin-bottom-0">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i> Editar servicio</h5>
                    <a class="btn btn-outline-warning elevation-2 btn-md ml-auto rounded float-right" title="Volver" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('producto.index')}}"><i class="fa fa-reply text-warning"></i></a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::model($producto, ['route' => ['producto.update', $producto->id],'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal'])!!}
                  @method('PUT')
                  @include('producto.formedit')
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
</main>

@endsection