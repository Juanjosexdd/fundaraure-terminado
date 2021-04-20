<div class="form-group row">
    <label for="nombre" class="col-sm-3 col-form-label">NOMBRE :</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('nombre') is-invalid @enderror"
            id="nombre"
            type="text"
            name="nombre"
            placeholder="Escribe aquí el nombre"
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
    <label for="codcuenta" class="col-sm-3 col-form-label">CODIGO CUENTA : </label>
    <div class="col-md-9">
        <input class="form-control shadow-lg bg-light @error('codcuenta') is-invalid @enderror"
            id="codcuenta"
            type="text"
            name="codcuenta"
            placeholder="Escribe aquí el codigo de la cuenta"
            value="{{ old('codcuenta') }}"
            style="text-transform:uppercase"
        >
        @error('codcuenta')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>