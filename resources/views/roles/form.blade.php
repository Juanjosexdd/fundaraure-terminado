<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nombre :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('name') is-invalid @enderror"
        id="name"
        type="text"
        name="name"
        placeholder="Ej: Supervisor"
        value="{{ old('name', $role->name) }}"
    >
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>

<div class="form-group row">
    <label for="slug" class="col-sm-2 col-form-label">URL amigable :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('slug') is-invalid @enderror"
        id="slug"
        type="text"
        name="slug"
        placeholder="Supervisor"
        value="{{ old('slug', $role->slug) }}"
    >
    @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Descripción :</label>
    <div class="col-md-10">
    <input class="form-control shadow-sm bg-light @error('description') is-invalid @enderror"
        id="description"
        type="text"
        name="description"
        placeholder="Supervisa los registros del sistema."
        value="{{ old('description', $role->description) }}"
    >
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong class="help-block">{{ $message }}</strong>
        </span>
    @enderror
    </div>
</div>
<hr>
<h3>Permiso especial</h3>

<div class="form-group">
    <label>{{ Form::radio('special', 'all-access')}} Acceso total</label>
    <label>{{ Form::radio('special', 'no-access')}} Ningun acceso</label>
</div>
<h3>Lista de Permisos</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($permissions as $permission)
            <li>
                <label class="">
                    {{ Form::checkbox('permissions[]', $permission->id, null)}}
                    {{ $permission->name }}
                    <!-- <em>({{ $permission->description ?: 'N/A'}})</em> -->
                </label>
            </li>
        @endforeach
    </ul>

</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success btn-block elevation-2 rounded"><i class="fa fa-save"></i> Guardar</button>
</div>