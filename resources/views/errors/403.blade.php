@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">FUNDARAURE</a></li>
    </ol>
	<div class="container">
		{{-- <div class="row">
			<div class="col-md-12 offset-2">
    			<p class="text-warning" style="font-size: 180px">403</p>
    		</div>
    	</div>
    	<p>Acciòn no autorizada</p> --}}
        <div class="error-page">
            <h2 class="headline text-warning display-1"><strong>Error 403</strong></h2>

            <div class="error-content">
              <h2><i class="fa fa-warning text-warning"></i> ¡Uy! Acceso denegado.  <i class="fa fa-warning text-warning"></i></h2>
              <p class="h3">
                Acción no autorizada, no tienes acceso a la ruta que intentas acceder, <a class="" href="{{url('home')}}" onclick="event.preventDefault(); document.getElementById('home-form').submit();"> regresa al home,</a><form id="home-form" action="{{url('home')}}" method="GET" style="display: none;">{{csrf_field()}}</form><span class="h3">Ponte en contacto con el administrador del sistema.</span>
              </p>
            </div>
        </div>
	</div>
</main>

@endsection