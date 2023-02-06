<div class="row mb-3">
    <label for="Nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
    <div class="col-md-6">
        <input id="nombre" type="text" class="form-control" name="nombre" value="{{isset($cliente->nombre)?$cliente->nombre:''}}" autocomplete="nombre" autofocus>
    </div>
</div>
<div class="row mb-3">
    <label for="Cedula" class="col-md-4 col-form-label text-md-end">{{ __('Cedula') }}</label>
    <div class="col-md-6">
        <input id="cedula" type="number" class="form-control" name="cedula" value="{{isset($cliente->cedula)?$cliente->cedula:''}}" autocomplete="cedula" autofocus>
    </div>
</div>
<div class="row mb-3">
    <label for="Email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{isset($cliente->email)?$cliente->email:''}}" autocomplete="email" autofocus>
    </div>
</div>
<div class="row mb-3">
    <label for="Telefono" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
    <div class="col-md-6">
        <input id="telefono" type="number" class="form-control" name="telefono" value="{{isset($cliente->telefono)?$cliente->telefono:''}}" autocomplete="telefono" autofocus>
    </div>
</div>
<div class="row mb-3">
    <label for="Imagen" class="col-md-4 col-form-label text-md-end">{{ __('Imagen') }}</label>
    <div class="col-md-6">
    @if(isset($cliente->imagen))
        <img class="img-thumbnail" src="{{asset('storage').'/'.$cliente->imagen}}" alt="">
    @endif
        <input id="imagen" type="file" class="form-control" name="imagen" value="{{isset($cliente->imagen)?$cliente->imagen:''}}" autocomplete="nombre" autofocus>
    </div>
</div>
<div class="row mb-3">
    <label for="Observaciones" class="col-md-4 col-form-label text-md-end">{{ __('Observaciones') }}</label>
    <div class="col-md-6">
        <input id="observaciones" type="text" class="form-control" name="observaciones" value="{{isset($cliente->observaciones)?$cliente->observaciones:''}}" autocomplete="observaciones" autofocus>
    </div>
</div>
<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{$modo=='create' ? __('Guardar'): __('Modificar')}}
        </button>
    </div>
</div>
<a href="{{url('clientes')}}">Regresar</a>