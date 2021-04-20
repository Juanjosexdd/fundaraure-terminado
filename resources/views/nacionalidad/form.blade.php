<div class="form-group row">
    <label for="nombre" class="col-sm-3 col-form-label">NOMBRE:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('nombre') is-invalid @enderror"
            id="nombre"
            type="text"
            name="nombre"
            placeholder=""
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
    <label for="abreviado" class="col-sm-3 col-form-label">ABREVIATURA : </label>
    <div class="col-md-9">
        <input class="form-control shadow-lg bg-light @error('abreviado') is-invalid @enderror"
            id="abreviado"
            type="text"
            name="abreviado"
            placeholder=""
            value="{{ old('abreviado') }}"
            style="text-transform:uppercase"
        >
        @error('abreviado')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>