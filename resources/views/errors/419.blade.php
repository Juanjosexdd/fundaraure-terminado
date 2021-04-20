@extends('auth.contenido')

@section('login')
<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card-group mb-0">
      <div class="card p-4">
        <div class="error-page">
        <h2 class="headline text-warning display-1"><strong>Error 419</strong></h2>
        <div class="error-content">
          <h2><i class="fa fa-warning text-warning"></i> Su session a expirado. <i class="fa fa-warning text-warning"></i></h2>
          <p class="h3">
            Su session ha sido finalizada <a href="{{ route('login') }}">Volver al login.</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
