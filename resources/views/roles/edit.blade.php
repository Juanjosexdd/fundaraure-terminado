@extends('principal')
@section('styles')
  <link rel="stylesheet" href="/iCheck/flat/green.css">
@endsection
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
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i> Editar rol</h5>
                    <a class="btn btn-outline-warning elevation-2 btn-md ml-auto rounded float-right" title="Volver" data-toggle="tooltip" data-placement="left" type="button" href="{{ route('roles.index')}}"><i class="fa fa-reply text-warning"></i></a>
                </div>
            </div>
            <div class="card-body">
                {!! Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal'])!!}
                  @method('PUT')
                  @include('roles.form')
                {!! Form::close() !!}
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
</main>

@endsection
@section("script")
  <script src="/iCheck/icheck.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green',
      increaseArea: '10%' /* optional */
    });
  });
</script>
@endsection