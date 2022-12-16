@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Edición del Parque') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('parque.update', $parque->id) }}" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Nombre del Parque') }}</label>
                        <input type="text" name="nombreParque" class="form-control" placeholder="{{ __('Nombre') }}" autofocus value="{{ old('nombreParque', $parque->nombreParque) }}">
                        @if ($errors->has('nombreParque'))
                        <span class="error text-danger" for="input-nombreParque">{{ $errors->first('nombreParque') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-localidad">{{ __('Localidad') }}</label>
                        <select name="localidad" id="localidad" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Antonio Nariño" {{ $parque->localidad == 'Antonio Nariño' ? 'selected' : '' }}>Antonio Nariño</option>
                            <option value="Barrios Unidos" {{ $parque->localidad == 'Barrios Unidos' ? 'selected' : '' }}>Barrios Unidos</option>
                            <option value="Bosa" {{ $parque->localidad == 'Bosa' ? 'selected' : '' }}>Bosa</option>
                            <option value="Chapinero" {{ $parque->localidad == 'Chapinero' ? 'selected' : '' }}>Chapinero</option>
                            <option value="Ciudad Bolívar" {{ $parque->localidad == 'Ciudad Bolívar' ? 'selected' : '' }}>Ciudad Bolívar</option>
                            <option value="Engativá" {{ $parque->localidad == 'Engativá' ? 'selected' : '' }}>Engativá</option>
                            <option value="Fontibón" {{ $parque->localidad == 'Fontibón' ? 'selected' : '' }}>Fontibón</option>
                            <option value="Kennedy" {{ $parque->localidad == 'Kennedy' ? 'selected' : '' }}>Kennedy</option>
                            <option value="La Candelaria" {{ $parque->localidad == 'La Candelaria' ? 'selected' : '' }}>La Candelaria</option>
                            <option value="Los Mártires" {{ $parque->localidad == 'Los Mártires' ? 'selected' : '' }}>Los Mártires</option>
                            <option value="Puente Aranda" {{ $parque->localidad == 'Puente Aranda' ? 'selected' : '' }}>Puente Aranda</option>
                            <option value="Rafael Uribe Uribe" {{ $parque->localidad == 'Rafael Uribe Uribe' ? 'selected' : '' }}>Rafael Uribe Uribe</option>
                            <option value="San Cristóbal" {{ $parque->localidad == 'San Cristóbal' ? 'selected' : '' }}>San Cristóbal</option>
                            <option value="Santa Fe" {{ $parque->localidad == 'Santa Fe' ? 'selected' : '' }}>Santa Fe</option>
                            <option value="Suba" {{ $parque->localidad == 'Suba' ? 'selected' : '' }}>Suba</option>
                            <option value="Sumapaz" {{ $parque->localidad == 'Sumapaz' ? 'selected' : '' }}>Sumapaz</option>
                            <option value="Teusaquillo" {{ $parque->localidad == 'Teusaquillo' ? 'selected' : '' }}>Teusaquillo</option>
                            <option value="Tunjuelito" {{ $parque->localidad == 'Tunjuelito' ? 'selected' : '' }}>Tunjuelito</option>
                            <option value="Usaquén" {{ $parque->localidad == 'Usaquén' ? 'selected' : '' }}>Usaquén</option>
                            <option value="Usme" {{ $parque->localidad == 'Usme' ? 'selected' : '' }}>Usme</option>
                        </select>
                        @if ($errors->has('localidad'))
                        <span class="error text-danger" for="input-localidad">{{ $errors->first('localidad') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Area en m') }}<sup>2</sup></label>
                                <input type="number" name="area" class="form-control" placeholder="{{ __('Area del Parque') }}" value="{{ old('area', $parque->area) }}" autofocus>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-escala">{{ __('Escala') }}</label>
                                <select name="escala" id="escala" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <option value="Parque de Bolsillo" {{ $parque->escala == 'Parque de Bolsillo' ? 'selected' : '' }}>Parque de Bolsillo</option>
                                    <option value="Parque Metropolitano" {{ $parque->escala == 'Parque Metropolitano' ? 'selected' : '' }}>Parque Metropolitano</option>
                                    <option value="Parque Vecinal" {{ $parque->escala == 'Parque Vecinal' ? 'selected' : '' }}>Parque Vecinal</option>
                                    <option value="Parque Zonal" {{ $parque->escala == 'Parque Zonal' ? 'selected' : '' }}>Parque Zonal</option>
                                    <option value="Parque Regional" {{ $parque->escala == 'Parque Regional' ? 'selected' : '' }}>Parque Regional</option>
                                </select>
                                @if ($errors->has('escala'))
                                <span class="error text-danger" for="input-escala">{{ $errors->first('escala') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-estrato">{{ __('Estrato') }}</label>
                        <select name="estrato" id="estrato" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="1" {{ $parque->estrato == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $parque->estrato == 2 ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $parque->estrato == 3 ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $parque->estrato == 4 ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $parque->estrato == 5 ? 'selected' : '' }}>5</option>
                        </select>
                        @if ($errors->has('estrato'))
                        <span class ="error text-danger" for="input-estrato">{{ $errors->first('estrato') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-direccion">{{ __('Dirección') }}</label>
                        <input type="text" name="direccion" id="input-direccion" class="form-control" placeholder="{{ __('Dirección del Parque') }}" value="{{ old('direccion', $parque->direccion) }}" autofocus>
                        @if ($errors->has('direccion'))
                        <span class ="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-foto">{{ __('Cargar Foto') }}</label>
                        <input type="file" name="foto" class="form-control" id="photo" value="{{ isset($parque->foto)?$parque->foto:'' }}">
                        @if ($errors->has('foto'))
                        <span class ="error text-danger" for="input-foto">{{ $errors->first('foto') }}</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="/parque" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection