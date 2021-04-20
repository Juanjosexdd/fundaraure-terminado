<div class="form-group row">
    <div class="col-md-3">
        {{ Form::label('codnaturaleza', 'CUENTA:') }}
    </div>
    <div class="col-md-9">
        {{ Form::select('codnaturaleza', $naturaleza, null,  ['class' => 'form-control','placeholder' => ' ']) }}
    </div>
</div>
<div class="form-group row">
    <label for="nombre" class="col-sm-3 col-form-label  mayusculas">NOMBRE :</label>
    <div class="col-md-9">
        <input class="form-control mayusculas shadow-sm bg-light @error('nombre') is-invalid @enderror"
            id="nombre"
            type="text"
            name="nombre"
            placeholder="Escribe aquí el nombre."
            value="{{ old('nombre') }}"
            style="text-transform:uppercase"

        >
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="descripcion" class="col-sm-3 col-form-label mayusculas">DESCRIPCIÒN : </label>
    <div class="col-md-9">
        <input class="form-control mayusculas shadow-lg bg-light @error('descripcion') is-invalid @enderror"
            id="descripcion"
            type="text"
            name="descripcion"
            placeholder="Escribe aquí la descripcion."
            value="{{ old('descripcion') }}"
            style="text-transform:uppercase"
        >
        @error('descripcion')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>