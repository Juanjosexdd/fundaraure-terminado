@extends('auth.contenido')

@section('title','Fundaraure')

@section('content')
<br>
<div class="container">
  @include('partials.session-status')
  <div class="row my-auto">
    <div class="col-12 col-lg-6">
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h1 class="text-center text-uppercase display-4"><span class="funda">fund</span><span class="araure">araure</span></h1>
          <p class="lead text-primar text-justify">
            La fundación para el mejoramiento y desarrollo del Municipio Araure (FUNDARAURE), es una institución sin fines de lucro, con la personalidad jurídica y patrimonio propio, creada el 10 de agosto de 1965 por el Consejo Municipal según Ordenanza de la fecha antes indicada, debidamente registrada y protocolizada.
            <br>
            <br>
            El objeto inicial fue el mejoramiento municipal, comunal y vecinal del Distrito Araure, para ese entonces tenía la finalidad de urbanizar y edificar terrenos que fueron dotados por el municipio o por particulares, además ejercer cualquier actitud de carácter social y cultural.
          </p>
        </div>
        <div class="tab-pane fade" id="mision" role="tabpanel" aria-labelledby="mision-tab">
          <h1 class="text-center text-uppercase display-4"><span class="funda">Mis</span><span class="araure">ión</span></h1>
          <p class="lead text-primar text-justify">
            Prestar un Servicio de Calidad, con la mayor eficiencia y eficacia a todo el colectivo Araureño, solventándoles a Tiempo los problemas y Necesidades que se le presenten. Prestando servicios comunitarios a través de donaciones a personas de pocos recursos, y realizando en sitios estratégicos diversas jornadas tales como salud, alimentos y deporte.
          </p>

        </div>
        <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
          <h1 class="text-center text-uppercase display-4"><span class="funda">Vis</span><span class="araure">ión</span></h1>
          <p class="lead text-primar text-justify">
            Fortalecer la estructura Organizativa y Funcional de la fundación para crecer en un periodo determinado como unas de las organizaciones a nivel regional más sólidas y eficientes en el ramo, entre las visiones fundamentales está el convertir a la fundación en un ente de apoyo y sostén para toda la población del Municipio Araure y Municipios aledaños de manera solidaria logrando como único equilibrio entre el ente y la comunidad en general.
          </p>

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="col-12 col-sm-12 col-lg-12">
            <form class="bg-white shadow rounded py-3 px-4"
              action="{{ route('message.store')}}"
              method="POST"
              >
              <h1 class="display-6">Contacto</h1>
              <hr>
              @csrf
              <div class="form-group">
                <label for="name">Nombre: </label>
                <input class="form-control bg-light shadow-sm @error('name') is-invalid @else  @enderror"
                  id="name"
                  type="text"
                  name="name"
                  placeholder="Escribe aquí tu nombre..."
                  value="{{ old('name') }}"
                >
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email: </label>
                <input class="form-control bg-light shadow-sm @error('email') is-invalid @else  @enderror"
                  id="email"
                  type="email"
                  name="email"
                  placeholder="Escribe aquí tu email..."
                  value="{{ old('email') }}"
                >
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="subject">Asunto: </label>
                <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else @enderror"
                id="subject"
                type="text"
                name="subject"
                placeholder="Escribe aquí el asunto del mensaje..."
                value="{{ old('subject') }}">
                @error('subject')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="content">Mensaje: </label>
                <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else  @enderror"
                  id="content"
                  name="content"
                  placeholder="Escribe aquí el contenido de tu mensaje ...">{{ old('content') }}</textarea>
                @error('content')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <button class="btn btn-success btn-lg btn-block" type="submit">Enviar</button>
            </form>
            </div>

        </div>
      </div>
    </div>
    <div class="col-12 col-lg-5 offset-1">
      <form class="form-horizontal was-validated bg-white shadow rounded py-3 px-4" method="POST" action="{{route('login')}}">
          {{ csrf_field() }}
              <div class="card-body">
                <h1 class="display-6">Iniciar sessión</h1>
                <hr>
                <br>
                <br>
                <div class="form-group">
                  <label for="usuario">Usuario: </label>
                  <input class="form-control bg-light shadow-sm @error('usuario') is-invalid @else  @enderror"
                    id="usuario"
                    type="text"
                    name="usuario"
                    placeholder="Ingresa tu usuario"
                    value="{{ old('usuario') }}"
                  >
                  @error('usuario')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <br>
                <div class="form-group">
                  <label for="password">Contraseña: </label>
                  <input class="form-control bg-light shadow-sm @error('password') is-invalid @else  @enderror"
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Ingresa tu Contraseña"
                    value="{{ old('password') }}"
                  >
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <br>
                <hr>
                <div class="row">
                  <div class="col-8 offset-2">
                    <button type="submit" class="btn btn-success btn-md rounded btn-block"><i class="fa fa-sign-in"> Iniciar sesión</i> </button>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                  </div>
              </div>
            </div>
      </form>
    </div>
  </div>
</div>
@endsection