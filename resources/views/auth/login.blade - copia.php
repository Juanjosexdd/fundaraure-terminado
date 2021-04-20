@extends('auth.contenido')

@section('login')
  <div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-4">
      <div class="card-group mb-0">
        <div class="card p-0">
          <form class="form-horizontal was-validated" method="POST" action="{{route('login')}}">
          {{ csrf_field() }}
              <div class="card-body">
                <h3 class="text-center bg-success rounded">Fundaraure</h3>
                <div class="form-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                  <span class="p-2"><i class="icon-user"></i> Usuario :</span>
                  <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                  {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
                </div>
                <div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                  <span class="p-2"><i class="icon-lock"></i> Contraseña :</span>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                  {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
                </div>
                <div class="row">
                  <div class="col-8 offset-2">
                    <button type="submit" class="btn btn-success btn-sm rounded btn-block"><i class="fa fa-sign-in"> Iniciar sesión</i> </button>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
@endsection
