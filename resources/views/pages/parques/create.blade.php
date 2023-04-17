@extends('layouts.app')

@section('content')

<style>
    .contenedor {
        border: 1px solid black;
        background-color: white;
        border-radius: 10px;
    }
</style>

<div class="container-fluid">
    <div class="col-xl-11 order-xl-1 py-5">
        <div class="card bg-white contenedor">
            <div class="card-header bg-purple border-0">
                <div class="row justify-content-center">
                    <h2 class="text-center text-white">{{ __('Registro de Parque') }}</h2>
                </div>
            </div>
            <div class="card-body">

                <h6 class="heading-small text-muted mb-4">{{ __('Información') }}</h6>
                <form method="post" id="form-alert" action="{{ route('parque.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf

                    <div class="pl-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Nombre del Parque') }}</label>
                            <input type="text" name="nombreParque" class="form-control" placeholder="{{ __('Nombre') }}" autofocus value="{{ old('nombreParque') }}">
                            @if ($errors->has('nombreParque'))
                            <span class="error text-danger" for="input-nombreParque">{{ $errors->first('nombreParque') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-localidad">{{ __('Localidad') }}</label>
                            <select name="localidad" id="localidad" class="form-control">
                                <option value="" selected>Seleccione una opción</option>
                                <option value="Antonio Nariño">Antonio Nariño</option>
                                <option value="Barrios Unidos">Barrios Unidos</option>
                                <option value="Bosa">Bosa</option>
                                <option value="Chapinero">Chapinero</option>
                                <option value="Ciudad Bolívar">Ciudad Bolívar</option>
                                <option value="Engativá">Engativá</option>
                                <option value="Fontibón">Fontibón</option>
                                <option value="Kennedy">Kennedy</option>
                                <option value="La Candelaria">La Candelaria</option>
                                <option value="Los Mártires">Los Mártires</option>
                                <option value="Puente Aranda">Puente Aranda</option>
                                <option value="Rafael Uribe Uribe">Rafael Uribe Uribe</option>
                                <option value="San Cristóbal">San Cristóbal</option>
                                <option value="Santa Fe">Santa Fe</option>
                                <option value="Suba">Suba</option>
                                <option value="Sumapaz">Sumapaz</option>
                                <option value="Teusaquillo">Teusaquillo</option>
                                <option value="Tunjuelito">Tunjuelito</option>
                                <option value="Usaquén">Usaquén</option>
                                <option value="Usme">Usme</option>
                            </select>
                            @if ($errors->has('localidad'))
                            <span class="error text-danger" for="input-localidad">{{ $errors->first('localidad') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-area">{{ __('Area en m') }}<sup>2</sup></label>
                                    <input type="number" name="area" class="form-control" placeholder="{{ __('Area del Parque') }}" value="{{ old('area') }}" autofocus>
                                    @if ($errors->has('area'))
                                    <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-escala">{{ __('Escala') }}</label>
                                    <select name="escala" id="escala" class="form-control">
                                        <option value="" selected>Seleccione una opción</option>
                                        <option value="Parque de Bolsillo">Parque de Bolsillo</option>
                                        <option value="Parque Metropolitano">Parque Metropolitano</option>
                                        <option value="Parque Vecinal">Parque Vecinal</option>
                                        <option value="Parque Zonal">Parque Zonal</option>
                                        <option value="Parque Regional">Parque Regional</option>
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
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @if ($errors->has('estrato'))
                            <span class="error text-danger" for="input-estrato">{{ $errors->first('estrato') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-direccion">{{ __('Dirección') }}</label>
                            <input type="text" name="direccion" id="input-direccion" class="form-control" placeholder="{{ __('Dirección del Parque') }}" value="{{ old('direccion') }}" autofocus>
                            @if ($errors->has('direccion'))
                            <span class="error text-danger" for="input-direccion">{{ $errors->first('direccion') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-foto">{{ __('Cargar Foto') }}</label>
                            <input type="file" name="foto" class="form-control" id="photo" value="{{ old('foto') }}">
                            @if ($errors->has('foto'))
                            <span class="error text-danger" for="input-foto">{{ $errors->first('foto') }}</span>
                            @endif
                        </div>

                        <hr class="my-4" />

                        <h6 class="heading-small text-muted mb-4">{{ __('Ubicación del parque') }}</h6>

                        <div class="row justify-content-center">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Latitud</label>
                                    <input class="form-control" type="text" name="latitud" value="{{ old('latitud') }}" id="lat" readonly="true">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Longitud</label>
                                    <input class="form-control" name="longitud" value="{{ old('longitud') }}" id="lng" readonly="true">

                                </div>
                            </div>
                        </div>

                        <input class="form-control" type="text" id="place_input" placeholder="Ingresa una ubicación">
                        <div class="row">
                            <div class="col">
                                <div class="card border-0">
                                    <div id="map-default" class="map-canvas" style="height: 500px;"></div>
                                </div>
                            </div>
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
</div>

@endsection

@push('js')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOCm_Uov0IyKa71QmTBO9VHFWjWK7pDOY"></script>

@endpush