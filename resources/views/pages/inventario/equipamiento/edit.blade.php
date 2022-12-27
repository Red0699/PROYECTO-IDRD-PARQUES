@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Registro de equipamiento') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('equipamiento.update',$equipamiento->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('modulo') }}</label>
                        <select name="modulo" id="modulo" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="asadero" {{ old('modulo',$equipamiento->modulo) == 'asadero' ? 'selected' : '' }}>asadero</option>
                            <option value="auditorio" {{ old('modulo',$equipamiento->modulo) == 'auditorio' ? 'selected' : '' }}>auditorio</option>
                            <option value="baños" {{ old('modulo',$equipamiento->modulo) == 'baños' ? 'selected' : '' }}>baños</option>
                            <option value="baterias sanitarias" {{ old('modulo',$equipamiento->modulo) == 'baterias sanitarias' ? 'selected' : '' }}>baterias sanitarias</option>
                            <option value="bodegas" {{ old('modulo',$equipamiento->modulo) == 'bodegas' ? 'selected' : '' }}>bodegas</option>
                            <option value="cafeteria" {{ old('modulo',$equipamiento->modulo) == 'cafeteria' ? 'selected' : '' }}>cafeteria</option>
                            <option value="CAI" {{ old('modulo',$equipamiento->modulo) == 'CAI' ? 'selected' : '' }}>CAI</option>
                            <option value="camerino" {{ old('modulo',$equipamiento->modulo) == 'camerino' ? 'selected' : '' }}>camerino</option>
                            <option value="caseta" {{ old('modulo',$equipamiento->modulo) == 'caseta' ? 'selected' : '' }}>caseta</option>
                            <option value="cicloruta" {{ old('modulo',$equipamiento->modulo) == 'cicloruta' ? 'selected' : '' }}>cicloruta</option>
                            <option value="concha acustica" {{ old('modulo',$equipamiento->modulo) == 'concha acustica' ? 'selected' : '' }}>concha acustica</option>
                            <option value="iglesias" {{ old('modulo',$equipamiento->modulo) == 'iglesias' ? 'selected' : '' }}>iglesias</option>
                            <option value="gradas" {{ old('modulo',$equipamiento->modulo) == 'gradas' ? 'selected' : '' }}>gradas</option>
                            <option value="locales" {{ old('modulo',$equipamiento->modulo) == 'locales' ? 'selected' : '' }}>locales</option>
                        </select>
                        @if ($errors->has('modulo'))
                        <span class="error text-danger" for="input-modulo">{{ $errors->first('modulo') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Largo en metros') }}</label>
                                <input type="number" name="largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo',$equipamiento->largo) }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho',$equipamiento->ancho) }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Area en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" class="form-control" placeholder="{{ __('Area del Parque') }}" value="{{ old('area',$equipamiento->area) }}" autofocus>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('luz') }}</label>
                                <select name="luz" id="luz" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('luz',$equipamiento->luz) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('luz',$equipamiento->luz) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('luz'))
                                <span class="error text-danger" for="input-luz">{{ $errors->first('luz') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('agua') }}</label>
                                <select name="agua" id="agua" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('agua',$equipamiento->agua) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('agua',$equipamiento->agua) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('agua'))
                                <span class="error text-danger" for="input-agua">{{ $errors->first('agua') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('gas') }}</label>
                                <select name="gas" id="gas" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('gas',$equipamiento->gas) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('gas',$equipamiento->gas) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('gas'))
                                <span class="error text-danger" for="input-gas">{{ $errors->first('gas') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ __('descripcion') }}</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('descripcion') }}" value="{{ old('descripcion',$equipamiento->descripcion) }}" autofocus>
                        @if ($errors->has('descripcion'))
                        <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('estado') }}</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Bueno" {{ old('estado',$equipamiento->estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                            <option value="En Mantenimiento" {{ old('estado',$equipamiento->estado) == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                            <option value="Fuera de Servicio" {{ old('estado',$equipamiento->estado) == 'Fuera de Servicio' ? 'selected' : '' }}>Fuera de Servicio</option>
                        </select>
                        @if ($errors->has('estado'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="/inventario" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>

@endsection