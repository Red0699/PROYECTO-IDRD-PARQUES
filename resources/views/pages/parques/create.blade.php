@extends('layouts.app')

@section('content')

<style>
    .contenedor {
        border: 1px solid black;
        background-color: white;
        border-radius: 10px;
    }
</style>

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

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
                                <option value="Antonio Nariño" {{ old('localidad') == 'Antonio Nariño' ? 'selected' : '' }}>Antonio Nariño</option>
                                <option value="Barrios Unidos" {{ old('localidad') == 'Barrios Unidos' ? 'selected' : '' }}>Barrios Unidos</option>
                                <option value="Bosa" {{ old('localidad') == 'Bosa' ? 'selected' : '' }}>Bosa</option>
                                <option value="Chapinero" {{ old('localidad') == 'Chapinero' ? 'selected' : '' }}>Chapinero</option>
                                <option value="Ciudad Bolívar" {{ old('localidad') == 'Ciudad Bolívar' ? 'selected' : '' }}>Ciudad Bolívar</option>
                                <option value="Engativá" {{ old('localidad') == 'Engativá' ? 'selected' : '' }}>Engativá</option>
                                <option value="Fontibón" {{ old('localidad') == 'Fontibón' ? 'selected' : '' }}>Fontibón</option>
                                <option value="Kennedy" {{ old('localidad') == 'Kennedy' ? 'selected' : '' }}>Kennedy</option>
                                <option value="La Candelaria" {{ old('localidad') == 'La Candelaria' ? 'selected' : '' }}>La Candelaria</option>
                                <option value="Los Mártires" {{ old('localidad') == 'Los Mártires' ? 'selected' : '' }}>Los Mártires</option>
                                <option value="Puente Aranda" {{ old('localidad') == 'Puente Aranda' ? 'selected' : '' }}>Puente Aranda</option>
                                <option value="Rafael Uribe Uribe" {{ old('localidad') == 'Rafael Uribe Uribe' ? 'selected' : '' }}>Rafael Uribe Uribe</option>
                                <option value="San Cristóbal" {{ old('localidad') == 'San Cristóbal' ? 'selected' : '' }}>San Cristóbal</option>
                                <option value="Santa Fe" {{ old('localidad') == 'Santa Fe' ? 'selected' : '' }}>Santa Fe</option>
                                <option value="Suba" {{ old('localidad') == 'Suba' ? 'selected' : '' }}>Suba</option>
                                <option value="Sumapaz" {{ old('localidad') == 'Sumapaz' ? 'selected' : '' }}>Sumapaz</option>
                                <option value="Teusaquillo" {{ old('localidad') == 'Teusaquillo' ? 'selected' : '' }}>Teusaquillo</option>
                                <option value="Tunjuelito" {{ old('localidad') == 'Tunjuelito' ? 'selected' : '' }}>Tunjuelito</option>
                                <option value="Usaquén" {{ old('localidad') == 'Usaquén' ? 'selected' : '' }}>Usaquén</option>
                                <option value="Usme" {{ old('localidad') == 'Usme' ? 'selected' : '' }}>Usme</option>
                            </select>
                            @if ($errors->has('localidad'))
                            <span class="error text-danger" for="input-localidad">{{ $errors->first('localidad') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-area">{{ __('Área en m') }}<sup>2</sup></label>
                                    <input type="number" name="area" class="form-control" placeholder="{{ __('Área del parque') }}" value="{{ old('area') }}" autofocus>
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
                                        <option value="Parque de Bolsillo" {{ old('escala') == 'Parque de Bolsillo' ? 'selected' : '' }}>Parque de Bolsillo</option>
                                        <option value="Parque Metropolitano" {{ old('escala') == 'Parque Metropolitano' ? 'selected' : '' }}>Parque Metropolitano</option>
                                        <option value="Parque Vecinal" {{ old('escala') == 'Parque Vecinal' ? 'selected' : '' }}>Parque Vecinal</option>
                                        <option value="Parque Zonal" {{ old('escala') == 'Parque Zonal' ? 'selected' : '' }}>Parque Zonal</option>
                                        <option value="Parque Regional" {{ old('escala') == 'Parque Regional' ? 'selected' : '' }}>Parque Regional</option>
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
                                <option value="1" {{ old('estrato') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('estrato') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('estrato') == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ old('estrato') == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ old('estrato') == '5' ? 'selected' : '' }}>5</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


@endpush