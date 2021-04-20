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
    <div class="col-md-3">
        {{ Form::label('codnacionalidad', 'NACIONALIDAD:') }}
    </div>
    <div class="col-md-9">
        {{ Form::select('codnacionalidad', $nacionalidad, null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    <label for="cedula" class="col-sm-3 col-form-label">CEDULA:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('cedula') is-invalid @enderror"
            id="cedula"
            type="text"
            name="cedula"
            placeholder="INGRESA EL NRO DOCUMENTO..."
            value="{{ old('cedula', $user->cedula)}}"
        >
        @error('cedula')
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
<div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">CORREO:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('email') is-invalid @enderror"
            id="email"
            type="email"
            name="email"
            placeholder="INGRESA UN CORREO..."
            value="{{ old('email', $user->email) }}"
        >
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {{ Form::label('coddpto', 'DEPARTAMENTO:') }}
    </div>
    <div class="col-md-9">
        {{ Form::select('coddpto', $dpto, null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-md-3">
        {{ Form::label('codcargo', 'CARGO:') }}
    </div>
    <div class="col-md-9">
        {{ Form::select('codcargo', $cargo, null, ['class' => 'form-control']) }}
    </div>
</div>
{{-- <div class="form-group row">
    <label for="usuario" class="col-sm-3 col-form-label">USUARIO:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('usuario') is-invalid @enderror"
            id="usuario"
            type="text"
            name="usuario"
            placeholder="INGRESA NOMBRE DE USUARIO..."
            value="{{ old('usuario', $user->usuario) }}"
        >
        @error('usuario')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-3 col-form-label">PASSWORD:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('password') is-invalid @enderror"
            id="password"
            type="password"
            name="password"
            placeholder="INGRESA UNA CONTRASEÑA..."
            value="{{ old('password',  $user->password) }}"
        >
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
 --}}<hr>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
            <li class="d-inline">
                <label>
                    {{ Form::checkbox('roles[]', $role->id, null )}}
                    {{ $role->name }}
                </label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </li>
        @endforeach
    </ul>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>