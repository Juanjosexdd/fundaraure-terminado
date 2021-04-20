@extends('principal')
@section('contenido')
<main class="main">
	 <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card rounded elevation-2">
            <div class="card-header">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-edit text-warning"></i>  Editar cliente</h5>
                    <a class="btn btn-outline-success elevation-2 btn-md ml-auto rounded float-right" type="button" href="{{ route('cliente.index')}}">
                    <i class="fa fa-reply"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::model($client, ['route' => ['cliente.update', $client->id],'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal'])!!}
                  @method('PUT')
                  @include('cliente.formedit')
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
</main>

@endsection