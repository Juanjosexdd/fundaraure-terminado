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
        <!-- Ejemplo de tabla Listado -->
        <div class="card rounded elevation-2">
            <div class="card-header">
                <div class="row">
                    <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i>  Registrar Usuario</h5>
                    <a class="btn btn-outline-success elevation-1 btn-md ml-auto rounded float-right" type="button" href="{{ route('user.index')}}">
                        <i class="fa fa-reply"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" class="form-horizontal ml-auto" action="{{ route('user.store') }}">
                  @csrf
                  @include('user.form')
                </form>
            </div>
        </div>
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