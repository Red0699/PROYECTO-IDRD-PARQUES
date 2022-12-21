@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Registro de Juego Infantil') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('juegos.store') }}" autocomplete="off">
                @csrf

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tipo de Juego') }}</label>
                        <input type="text" name="tipojuego" class="form-control" placeholder="{{ __('Tipo de Juego') }}" autofocus value="{{ old('tipojuego') }}">
                        @if ($errors->has('tipojuego'))
                        <span class="error text-danger" for="input-tipojuego">{{ $errors->first('tipojuego') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Iluminacion') }}</label>
                        <input type="text" name="iluminacion" class="form-control" placeholder="{{ __('Iluminacion') }}" autofocus value="{{ old('iluminacion') }}">
                        @if ($errors->has('iluminacion'))
                        <span class="error text-danger" for="input-iluminacion">{{ $errors->first('iluminacion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Material') }}</label>
                        <input type="text" name="material" class="form-control" placeholder="{{ __('Ingrese Material') }}" autofocus value="{{ old('material') }}">
                        @if ($errors->has('iluminacion'))
                        <span class="error text-danger" for="input-material">{{ $errors->first('material') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Altura') }}</label>
                        <input type="text" name="altura" class="form-control" placeholder="{{ __('Ingrese Altura') }}" autofocus value="{{ old('altura') }}">
                        @if ($errors->has('altura'))
                        <span class="error text-danger" for="input-altura">{{ $errors->first('altura') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Cerramiento') }}</label>
                        <input type="text" name="cerramiento" class="form-control" placeholder="{{ __('Ingrese Cerramiento') }}" autofocus value="{{ old('cerramiento') }}">
                        @if ($errors->has('cerramiento'))
                        <span class="error text-danger" for="input-cerramiento">{{ $errors->first('cerramiento') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Reservable') }}</label>
                        <input type="text" name="reservable" class="form-control" placeholder="{{ __('Ingrese Reservable') }}" autofocus value="{{ old('reservable') }}">
                        @if ($errors->has('reservable'))
                        <span class="error text-danger" for="input-reservable">{{ $errors->first('reservable') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Largo en m') }}</label>
                                <input type="number" name="largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo') }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en m') }}</label>
                                <input type="number" name="ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho') }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Area en m') }}<sup>2</sup></label>
                                <input type="number" name="area" class="form-control" placeholder="{{ __('Area del Parque') }}" value="{{ old('area') }}" autofocus>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Material de Superficie') }}</label>
                        <input type="text" name="materialsuperficie" id="input-materialsuperficie" class="form-control" placeholder="{{ __('Ingrese Material') }}" value="{{ old('materialsuperficie') }}" autofocus>
                        @if ($errors->has('materialsuperficie'))
                        <span class="error text-danger" for="input-materialsuperficie">{{ $errors->first('materialsuperficie') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Descripcion') }}</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('Descripcion') }}" value="{{ old('descripcion') }}" autofocus>
                        @if ($errors->has('descripcion'))
                        <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Estado') }}</label>
                        <input type="text" name="estado" id="estado" class="form-control" placeholder="{{ __('Estado') }}" value="{{ old('estado') }}" autofocus>
                        @if ($errors->has('estado'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('ID del Parque') }}</label>
                        <input type="number" name="idParque" id="idParque" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('idParque') }}" autofocus>
                        @if ($errors->has('idParque'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('idParque') }}</span>
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