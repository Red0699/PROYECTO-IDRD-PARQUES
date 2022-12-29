@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Edición de Cancha Deportiva') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('cancha.update',$cancha->id) }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tipo de Cancha Deportiva') }}</label>
                        <select name="tipocancha" id="tipocancha" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="arcos" {{ old('tipocancha',$cancha->tipocancha) == 'arcos' ? 'selected' : '' }}>arcos</option>
                            <option value="baloncesto" {{ old('tipocancha',$cancha->tipocancha) == 'baloncesto' ? 'selected' : '' }}>baloncesto</option>
                            <option value="banquitas" {{ old('tipocancha',$cancha->tipocancha) == 'banquitas' ? 'selected' : '' }}>banquitas</option>
                            <option value="beisbol" {{ old('tipocancha',$cancha->tipocancha) == 'beisbol' ? 'selected' : '' }}>beisbol</option>
                            <option value="canchas multiples" {{ old('tipocancha',$cancha->tipocancha) == 'canchas multiples' ? 'selected' : '' }}>canchas multiples</option>
                            <option value="fronton" {{ old('tipocancha',$cancha->tipocancha) == 'fronton' ? 'selected' : '' }}>fronton</option>
                            <option value="futbol" {{ old('tipocancha',$cancha->tipocancha) == 'futbol' ? 'selected' : '' }}>futbol</option>
                            <option value="microfutbol" {{ old('tipocancha',$cancha->tipocancha) == 'microfutbol' ? 'selected' : '' }}>microfutbol</option>
                            <option value="mini baloncesto" {{ old('tipocancha',$cancha->tipocancha) == 'mini baloncesto' ? 'selected' : '' }}>mini baloncesto</option>
                            <option value="mini tejo" {{ old('tipocancha',$cancha->tipocancha) == 'mini tejo' ? 'selected' : '' }}>mini tejo</option>
                            <option value="mini tennis" {{ old('tipocancha',$cancha->tipocancha) == 'mini tennis' ? 'selected' : '' }}>mini tennis</option>
                            <option value="mini voleibol" {{ old('tipocancha',$cancha->tipocancha) == 'mini voleibol' ? 'selected' : '' }}>mini voleibol</option>
                            <option value="otra cancha deportiva" {{ old('tipocancha',$cancha->tipocancha) == 'otra cancha deportiva' ? 'selected' : '' }}>otra cancha deportiva</option>
                            <option value="squash" {{ old('tipocancha',$cancha->tipocancha) == 'squash' ? 'selected' : '' }}>squash</option>
                            <option value="tablero" {{ old('tipocancha',$cancha->tipocancha) == 'tablero' ? 'selected' : '' }}>tablero</option>
                            <option value="tejo" {{ old('tipocancha',$cancha->tipocancha) == 'tejo' ? 'selected' : '' }}>tejo</option>
                            
                        </select>
                        @if ($errors->has('tipocancha'))
                        <span class="error text-danger" for="input-tipocancha">{{ $errors->first('tipocancha') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Material') }}</label>
                                <select name="material" id="material" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Adoquin arcilla" {{ old('material',$cancha->material) == 'Adoquin arcilla' ? 'selected' : '' }}>Adoquin arcilla</option>
                                    <option value="Acero" {{ old('material',$cancha->material) == 'Acero' ? 'selected' : '' }}>Acero</option>
                                    <option value="Adoquin ecológico" {{ old('material',$cancha->material) == 'Adoquin ecológico' ? 'selected' : '' }}>Adoquin ecológico</option>
                                    <option value="Arena" {{ old('material',$cancha->material) == 'Arena' ? 'selected' : '' }}>Arena</option>
                                    <option value="Asfalto con sintetico" {{ old('material',$cancha->material) == 'Asfalto con sintetico' ? 'selected' : '' }}>Asfalto con sintetico</option>
                                    <option value="Asfalto sin sintetico" {{ old('material',$cancha->material) == 'Asfalto sin sintetico' ? 'selected' : '' }}>Asfalto sin sintetico</option>
                                    <option value="Baldosa" {{ old('material',$cancha->material) == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
                                    <option value="Carboncillo" {{ old('material',$cancha->material) == 'Carboncillo' ? 'selected' : '' }}>Carboncillo</option>
                                    <option value="Cemento" {{ old('material',$cancha->material) == 'Cemento' ? 'selected' : '' }}>Cemento</option>
                                    <option value="Concreto" {{ old('material',$cancha->material) == 'Concreto' ? 'selected' : '' }}>Concreto</option>
                                    <option value="Fibra vidrio" {{ old('material',$cancha->material) == 'Fibra vidrio' ? 'selected' : '' }}>Fibra vidrio</option>
                                    <option value="Grama natural" {{ old('material',$cancha->material) == 'Grama natural' ? 'selected' : '' }}>Grama natural</option>
                                    <option value="Grama sintetica" {{ old('material',$cancha->material) == 'Grama sintetica' ? 'selected' : '' }}>Grama sintetica</option>
                                    <option value="Granito" {{ old('material',$cancha->material) == 'Granito' ? 'selected' : '' }}>Granito</option>
                                    <option value="Hierro" {{ old('material',$cancha->material) == 'Hierro' ? 'selected' : '' }}>Hierro</option>
                                    <option value="Madera" {{ old('material',$cancha->material) == 'Madera' ? 'selected' : '' }}>Madera</option>
                                    <option value="Mamposteria" {{ old('material',$cancha->material) == 'Mamposteria' ? 'selected' : '' }}>Mamposteria</option>
                                    <option value="Metal" {{ old('material',$cancha->material) == 'Metal' ? 'selected' : '' }}>Metal</option>
                                    <option value="Mixto(Madera/Metal)" {{ old('material',$cancha->material) == 'Mixto(Madera/Metal)' ? 'selected' : '' }}>Mixto(Madera/Metal)</option>
                                </select>
                                @if ($errors->has('material'))
                                <span class="error text-danger" for="input-material">{{ $errors->first('material') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Iluminación') }}</label>
                                <select name="iluminacion" id="iluminacion" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('iluminacion',$cancha->iluminacion) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('iluminacion',$cancha->iluminacion) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('iluminacion'))
                                <span class="error text-danger" for="input-iluminacion">{{ $errors->first('iluminacion') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Camerino') }}</label>
                                <select name="camerino" id="camerino" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('camerino',$cancha->camerino) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('camerino',$cancha->camerino) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('camerino'))
                                <span class="error text-danger" for="input-camerino">{{ $errors->first('camerino') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Cerramiento') }}</label>
                        <select name="cerramiento" id="cerramiento" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Ninguno" {{ old('cerramiento',$cancha->cerramiento) == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                            <option value="Total" {{ old('cerramiento',$cancha->cerramiento) == 'Total' ? 'selected' : '' }}>Total</option>
                        </select>
                        @if ($errors->has('cerramiento'))
                        <span class="error text-danger" for="input-cerramiento">{{ $errors->first('cerramiento') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Largo en metros') }}</label>
                                <input type="number" name="largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo',$cancha->largo) }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho',$cancha->ancho) }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Area en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" class="form-control" placeholder="{{ __('Area del Parque') }}" value="{{ old('area',$cancha->area) }}" autofocus>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Descripción') }}</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('Descripcion') }}" value="{{ old('descripcion',$cancha->descripcion) }}" autofocus></input>
                        @if ($errors->has('descripcion'))
                        <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Estado') }}</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Bueno" {{ old('estado',$cancha->estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                            <option value="En Mantenimiento" {{ old('estado',$cancha->estado) == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                            <option value="Fuera de Servicio" {{ old('estado',$cancha->estado) == 'Fuera de Servicio' ? 'selected' : '' }}>Fuera de Servicio</option>
                        </select>
                        @if ($errors->has('estado'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="{{ route('inventario.busqueda', $cancha->id_parque ) }}" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection