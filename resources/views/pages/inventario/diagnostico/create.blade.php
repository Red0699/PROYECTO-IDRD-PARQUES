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
                    <h2 class="text-center text-white">{{ __('Diagnostico') }}</h2>
                </div>
            </div>
            <div class="card-body">

                <form method="post" id="form-alert" action="{{ route('diagnostico.store', [$parque->id,$id, $tabla]) }}" autocomplete="off">
                    @csrf

                    <div class="pl-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Descripción del diagnostico') }}</label>
                            <input type="text" name="descripcion" class="form-control" placeholder="{{ __('Ingrese texto') }}" autofocus value="{{ old('descripcion') }}" required>
                            @if ($errors->has('descripcion'))
                            <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"> {{ __('Fecha') }}</label>
                            <input type="date" name="fecha" class="form-control" placeholder="{{ __('AAAA-MM-DD') }}" autofocus value="{{ old('fecha') }}" required>
                            @if ($errors->has('fecha'))
                            <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-estado">{{ __('Estado') }}</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="" selected>Seleccione una opción</option>
                                <option value="Bueno">Bueno con diagnostico</option>
                                <option value="En mal estado">En mal estado</option>
                                <option value="En proceso de mantenimiento">En proceso de mantenimiento</option>
                                <option value="Pendiente de piezas">Pendiente de piezas</option>
                                <option value="En prueba">En prueba</option>
                            </select>
                            @if ($errors->has('estado'))
                            <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-observaciones">{{ __('Observaciones') }}</label>
                            <textarea type="text" name="observaciones" id="input-observaciones" class="form-control" placeholder="{{ __('Observaciones del recurso') }}" value="{{ old('observaciones') }}" autofocus required></textarea>
                            @if ($errors->has('observaciones'))
                            <span class="error text-danger" for="input-observaciones">{{ $errors->first('observaciones') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-acciones">{{ __('Acciones') }}</label>
                            <input type="text" name="acciones" id="input-acciones" class="form-control" placeholder="{{ __('Acciones tomadas del recurso') }}" value="{{ old('acciones') }}" autofocus>
                            @if ($errors->has('acciones'))
                            <span class="error text-danger" for="input-acciones">{{ $errors->first('acciones') }}</span>
                            @endif

                        <div class="text-center">
                            <button name="submit" type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection