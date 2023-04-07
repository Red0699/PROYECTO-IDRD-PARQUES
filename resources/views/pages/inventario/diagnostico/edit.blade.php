@extends('layouts.app')

@section('content')


<div class="container-fluid mx-5 my-5">
    <div class="col-xl-11 order-xl-1">
        <div class="card bg-white contenedor">
            <div class="card-header bg-purple border-0">
                <div class="row justify-content-center">
                    <h2 class="text-center text-white">{{ __('Detalles del diagnostico') }}</h2>
                </div>
            </div>
            <div class="card-body">
                
                <form method="post" id="form-alert" action="{{ route('diagnostico.update', $diagnostico->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="pl-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Descripción del diagnostico') }}</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="{{ __('Nombre') }}" autofocus value="{{ old('descripcion', $diagnostico->descripcion) }}">
                            @if ($errors->has('descripcion'))
                            <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"> {{ __('Fecha') }}</label>
                            <input type="date" name="fecha" class="form-control" placeholder="{{ __('AAAA-MM-DD') }}" autofocus value="{{ old('fecha', $diagnostico->fecha) }}">
                            @if ($errors->has('fecha'))
                            <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-estado">{{ __('Estado') }}</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="" selected>Seleccione una opción</option>
                                <option value="Bueno con diagnostico" {{ old('estado', $diagnostico->estado) == 'Bueno con diagnostico' ? 'selected' : '' }}>Bueno con diagnostico</option>
                                <option value="En mal estado" {{ old('estado', $diagnostico->estado) == 'En mal estado' ? 'selected' : '' }}>En mal estado</option>
                                <option value="En proceso de mantenimiento" {{ old('estado', $diagnostico->estado) == 'En proceso de mantenimiento' ? 'selected' : '' }}>En proceso de mantenimiento</option>
                                <option value="Pendiente de piezas" {{ old('estado', $diagnostico->estado) == 'Pendiente de piezas' ? 'selected' : '' }}>Pendiente de piezas</option>
                                <option value="En prueba" {{ old('estado', $diagnostico->estado) == 'En prueba' ? 'selected' : '' }}>En prueba</option>
                            </select>
                            @if ($errors->has('estado'))
                            <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-observaciones">{{ __('Observaciones') }}</label>
                            <input type="text" name="observaciones" id="input-observaciones" class="form-control" placeholder="{{ __('Observaciones del recurso') }}" value="{{ old('observaciones', $diagnostico->observaciones) }}" autofocus>
                            @if ($errors->has('observaciones'))
                            <span class="error text-danger" for="input-observaciones">{{ $errors->first('observaciones') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-acciones">{{ __('Acciones') }}</label>
                            <input type="text" name="acciones" id="input-acciones" class="form-control" placeholder="{{ __('Acciones tomadas del recurso') }}" value="{{ old('acciones', $diagnostico->acciones) }}" autofocus>
                            @if ($errors->has('acciones'))
                            <span class="error text-danger" for="input-acciones">{{ $errors->first('acciones') }}</span>
                            @endif
                        </div> <!-- aquí se agregó el cierre del div -->

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection