<div class="form-group row">
    <label for="monto" class="col-sm-2 col-form-label">MONTO:</label>
    <div class="col-md-10">
        <input class="form-control shadow-sm bg-light @error('monto') is-invalid @enderror"
            id="monto"
            type="number"
            name="monto"
            placeholder="INGRESA UN MONTO"
            value="{{ old('monto') }}"
            pattern="[0-9]{0,15}"
            step='0.01' value='5.00'
        >
        @error('monto')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-md-2">
        {{ Form::label('codconceptoegreso', 'CONCEPTO:') }}
    </div>
    <div class="col-md-10">
        {{ Form::select('codconceptoegreso', $cingresos, null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2">
        {{ Form::label('codctapote', 'CUENTA :') }}
    </div>
    <div class="col-md-10">
        {{ Form::select('codctapote', $cpotes, null, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group row">
    <label for="observacion" class="col-sm-2 col-form-label">OBSERVACION :</label>
    <div class="col-md-10">
        <input class="form-control shadow-sm bg-light @error('observacion') is-invalid @enderror"
            id="observacion"
            type="text"
            name="observacion"
            placeholder="Escribe aquí una observacion."
            value="{{ old('observacion') }}"
            style="text-transform:uppercase"
        >
        @error('observacion')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>