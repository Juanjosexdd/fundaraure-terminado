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
                            <h5 class="card-title">&nbsp;&nbsp;<i class="fa fa-list text-success"></i>  Perfil de Usuarios</h5>
                            <a class="btn btn-outline-success elevation-2 btn-md ml-auto rounded float-right" type="button" href="{{ route('user.index')}}">
                                <i class="fa fa-reply"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true">Perfil</a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Actualizar información</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                            <div class="row">
                              <div class="col-md-10 offset-1">
                                <br>
                                <table class="table table-hover table-striped table-bordered">
                                  <tbody>
                                    <tr>
                                      <td><strong>NOMBRE :</strong> </td> <td>{{$user->nombre}}</td>
                                    </tr>
                                    <tr>
                                      <td><strong>APELLIDO :</strong></td> <td>{{$user->apellido}}</td>
                                    </tr>
                                    <tr>
                                      <td><strong>CEDULA :</strong></td> <td>{{$user->cedula}}</td>
                                    </tr>
                                    <tr>
                                      <td><strong>DIRECCIÓN:</strong> </td> <td>{{$user->direccion}}</td>
                                    </tr>
                                    <tr>
                                      <td><strong>CORREO :</strong></td> <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                      <td><strong>CREADO EL:</strong> </td> <td>{{$user->created_at->diffForHumans()}}</td>
                                    </tr>
                                    <tr>
                                      <td><strong>ÚLTIMA MODIFICACIÓN :</strong> </td> <td> {{$user->updated_at->diffForHumans()}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            {!! Form::model($user, ['route' => ['user.updatePass', $user->id],'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal'])!!}
                              @method('PUT')
                              <div class="form-group row">
                                <label for="nombre" class="col-sm-3 col-form-label">NOMBRE :</label>
                                <div class="col-md-9">
                                    <input class="form-control shadow-sm bg-light @error('nombre') is-invalid @enderror"
                                        id="nombre"
                                        type="text"
                                        name="nombre"
                                        placeholder="INGRESA EL NOMBRE DEL USUARIO..."
                                        value="{{ old('nombre', $user->nombre) }}"
                                    >
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="help-block">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label for="apellido" class="col-sm-3 col-form-label">APELLIDO :</label>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-sm bg-light @error('apellido') is-invalid @enderror"
                                          id="apellido"
                                          type="text"
                                          name="apellido"
                                          placeholder="INGRESA EL NOMBRE DEL USUARIO..."
                                          value="{{ old('apellido', $user->apellido) }}"
                                      >
                                      @error('apellido')
                                      <span class="invalid-feedback" role="alert">
                                          <strong class="help-block">{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="direccion" class="col-sm-3 col-form-label">DIRECCIÓN :</label>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-sm bg-light @error('direccion') is-invalid @enderror"
                                          id="direccion"
                                          type="text"
                                          name="direccion"
                                          placeholder="INGRESA LA DIRECCIÓN DEL USUARIO..."
                                          value="{{ old('direccion', $user->direccion) }}"
                                      >
                                      @error('direccion')
                                      <span class="invalid-feedback" role="alert">
                                          <strong class="help-block">{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="telefono" class="col-sm-3 col-form-label">TELEFONO :</label>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-sm bg-light @error('telefono') is-invalid @enderror"
                                          id="telefono"
                                          type="TEXT"
                                          name="telefono"
                                          placeholder="INGRESE UN NRO DE TELEFONO..."
                                          value="{{ old('telefono', $user->telefono) }}"
                                      >
                                      @error('telefono')
                                      <span class="invalid-feedback" role="alert">
                                          <strong class="help-block">{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>
                              {{-- <div class="form-group row">
                                  <label for="old_password" class="col-sm-3 col-form-label">ANTIGUA CONTRASEÑA :</label>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-sm bg-light @error('old_password') is-invalid @enderror"
                                          id="old_password"
                                          type="password"
                                          name="old_password"
                                          placeholder="CONTRASEÑA ANTIGUA"
                                          value="{{ old('old_password') }}"
                                      >
                                      @error('old_password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong class="help-block">{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div> --}}
                              <div class="form-group row">
                                  <label for="password" class="col-sm-3 col-form-label">CONTRASEÑA :</label>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-sm bg-light @error('password') is-invalid @enderror"
                                          id="password"
                                          type="password"
                                          name="password"
                                          placeholder="CONTRASEÑA"
                                          value="{{ old('password') }}"
                                      >
                                      @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong class="help-block">{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="password_confirmation" class="col-sm-3 col-form-label">CONFIRME CONTRASEÑA :</label>
                                  <div class="col-md-9">
                                      <input class="form-control shadow-sm bg-light @error('password_confirmation') is-invalid @enderror"
                                          id="password_confirmation"
                                          type="password"
                                          name="password_confirmation"
                                          placeholder="CONFIRME CONTRASEÑA"
                                          value="{{ old('password_confirmation') }}"
                                      >
                                      @error('password_confirmation')
                                      <span class="invalid-feedback" role="alert">
                                          <strong class="help-block">{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
                              </div>
                            {!! Form::close() !!}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection