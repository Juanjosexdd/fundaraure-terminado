<div class="form-group row">
    <label for="nombres" style="text-transform:uppercase" class="col-sm-2 col-form-label">Nombres :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('nombres') is-invalid @enderror"
        id="nombres"
        type="text"
        name="nombres"
        placeholder="Escribe aquí tu nombre..."
        value="{{ old('nombres', $client->nombres) }}"
        style="text-transform:uppercase"
    >
    @error('nombres')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<div class="form-group row">
    <label for="apellidos" style="text-transform:uppercase" class="col-sm-2 col-form-label">Apellidos :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('apellidos') is-invalid @enderror"
        id="apellidos"
        type="text"
        name="apellidos"
        placeholder="Escribe aquí tu apellidos..."
        value="{{ old('apellidos', $client->apellidos) }}"
        style="text-transform:uppercase"
    >
    @error('apellidos')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {{ Form::label('codnacionalidad', 'NACIONALIDAD:') }}
    </div>
    <div class="col-md-10">
        {{ Form::select('codnacionalidad', $nacionalidad, null,  ['class' => 'form-control','placeholder' => ' ']) }}
    </div>
</div>
<div class="form-group row">
    <label for="cedula" class="col-sm-2 col-form-label">CEDULA :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('cedula') is-invalid @enderror"
        id="cedula"
        type="text"
        name="cedula"
        placeholder="Escribe aquí la Cedula..."
        value="{{ old('cedula', $client->cedula) }}"
        style="text-transform:uppercase"
    >
    @error('cedula')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<div class="form-group row">
    <label for="direccion" style="text-transform:uppercase" class="col-sm-2 col-form-label">Dirección : </label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('direccion') is-invalid @enderror"
        id="direccion"
        type="text"
        name="direccion"
        placeholder="Escribe aquí la dirección..."
        value="{{ old('direccion', $client->direccion) }}"
        style="text-transform:uppercase"
    >
    @error('direccion')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<div class="form-group row">
    <label for="telefono"  style="text-transform:uppercase" class="col-sm-2 col-form-label">Telefono : </label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('telefono') is-invalid @enderror"
        id="telefono"
        type="text"
        name="telefono"
        placeholder="Escribe aquí tu telefono..."
        value="{{ old('telefono', $client->telefono) }}"
        style="text-transform:uppercase"
    >
    @error('telefono')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<div class="form-group row">
    <label for="email" style="text-transform:uppercase" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('email') is-invalid @enderror"
        id="email"
        type="text"
        name="email"
        autocomplete="off"
        placeholder="Escribe aquí tu correo..."
        value="{{ old('email', $client->email) }}"
        style="text-transform:uppercase"
    >
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {{ Form::label('codtipocliente', 'TIPO DE CLIENTE :') }}
    </div>
    <div class="col-md-10">
        {{ Form::select('codtipocliente', $tclientes, null,  ['class' => 'form-control','placeholder' => ' ']) }}
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-block btn-success elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>