{{-- <div class="form-group row">
    <label for="codigo" class="col-sm-3 col-form-label">CODIGO:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('codigo') is-invalid @enderror"
            id="codigo"
            type="text"
            name="codigo"
            placeholder="Escribe aquí el codigo del servicio..."
            value="{{ old('codigo', $producto->codigo) }}"
            style="text-transform:uppercase"
        >
        @error('codigo')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div> --}}
<div class="form-group row">
    <label for="nombre" class="col-sm-3 col-form-label">NOMBRE:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('nombre') is-invalid @enderror"
            id="nombre"
            type="text"
            name="nombre"
            placeholder="Escribe aquí el nombre del servicio..."
            value="{{ old('nombre', $producto->nombre) }}"
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
    <label for="precio_venta" class="col-sm-3 col-form-label">PRECIO VENTA:</label>
    <div class="col-md-9">
        <input class="form-control shadow-sm bg-light @error('precio_venta') is-invalid @enderror"
            id="precio_venta"
            type="number"
            name="precio_venta"
            placeholder="INGRESE UN MONTO"
            value="{{ old('precio_venta', $producto->precio_venta) }}"
            pattern="[0-9]{0,15}"
            step='0.01' value='5.00'
        >
        @error('precio_venta')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>