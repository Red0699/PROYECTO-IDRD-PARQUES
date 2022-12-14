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

            <form method="post" action="{{ route('juegos.store', $parque->id) }}" autocomplete="off">
                @csrf

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tipo de Juego') }}</label>
                        <select name="tipojuego" id="tipojuego" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Animales" {{ old('tipojuego') == 'Animales' ? 'selected' : '' }}>Animales</option>
                            <option value="Araña" {{ old('tipojuego') == 'Araña' ? 'selected' : '' }}>Araña</option>
                            <option value="Arenera" {{ old('tipojuego') == 'Arenera' ? 'selected' : '' }}>Arenera</option>
                            <option value="Balancin" {{ old('tipojuego') == 'Balancin' ? 'selected' : '' }}>Balancin</option>
                            <option value="Balanza" {{ old('tipojuego') == 'Balanza' ? 'selected' : '' }}>Balanza</option>
                            <option value="Barandas" {{ old('tipojuego') == 'Barandas' ? 'selected' : '' }}>Barandas</option>
                            <option value="Barras" {{ old('tipojuego') == 'Barras' ? 'selected' : '' }}>Barras</option>
                            <option value="Barril" {{ old('tipojuego') == 'Barril' ? 'selected' : '' }}>Barril</option>
                            <option value="Casa" {{ old('tipojuego') == 'Casa' ? 'selected' : '' }}>Casa</option>
                            <option value="Cilindro" {{ old('tipojuego') == 'Cilindro' ? 'selected' : '' }}>Cilindro</option>
                            <option value="Columpio" {{ old('tipojuego') == 'Columpio' ? 'selected' : '' }}>Columpio</option>
                            <option value="Cupula" {{ old('tipojuego') == 'Cupula' ? 'selected' : '' }}>Cupula</option>
                            <option value="Escalador" {{ old('tipojuego') == 'Escalador' ? 'selected' : '' }}>Escalador</option>
                            <option value="Escalera de Troncos" {{ old('tipojuego') == 'Escalera de Troncos' ? 'selected' : '' }}>Escalera de Troncos</option>
                            <option value="Estructura de metal" {{ old('tipojuego') == 'Estructura de metal' ? 'selected' : '' }}>Estructura de metal</option>
                            <option value="Hormiga" {{ old('tipojuego') == 'Hormiga' ? 'selected' : '' }}>Hormiga</option>
                            <option value="Juego infantil" {{ old('tipojuego') == 'Juego infantil' ? 'selected' : '' }}>Juego infantil</option>
                            <option value="Juego infantil mixto" {{ old('tipojuego') == 'Juego infantil mixto' ? 'selected' : '' }}>Juego infantil mixto</option>
                        </select>
                        @if ($errors->has('tipojuego'))
                        <span class="error text-danger" for="input-tipojuego">{{ $errors->first('tipojuego') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Material') }}</label>
                                <select name="material" id="material" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Adoquin arcilla" {{ old('material') == 'Adoquin arcilla' ? 'selected' : '' }}>Adoquin arcilla</option>
                                    <option value="Acero" {{ old('material') == 'Acero' ? 'selected' : '' }}>Acero</option>
                                    <option value="Adoquin ecológico" {{ old('material') == 'Adoquin ecológico' ? 'selected' : '' }}>Adoquin ecológico</option>
                                    <option value="Arena" {{ old('material') == 'Arena' ? 'selected' : '' }}>Arena</option>
                                    <option value="Asfalto con sintetico" {{ old('material') == 'Asfalto con sintetico' ? 'selected' : '' }}>Asfalto con sintetico</option>
                                    <option value="Asfalto sin sintetico" {{ old('material') == 'Asfalto sin sintetico' ? 'selected' : '' }}>Asfalto sin sintetico</option>
                                    <option value="Baldosa" {{ old('material') == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
                                    <option value="Carboncillo" {{ old('material') == 'Carboncillo' ? 'selected' : '' }}>Carboncillo</option>
                                    <option value="Cemento" {{ old('material') == 'Cemento' ? 'selected' : '' }}>Cemento</option>
                                    <option value="Concreto" {{ old('material') == 'Concreto' ? 'selected' : '' }}>Concreto</option>
                                    <option value="Fibra vidrio" {{ old('material') == 'Fibra vidrio' ? 'selected' : '' }}>Fibra vidrio</option>
                                    <option value="Grama natural" {{ old('material') == 'Grama natural' ? 'selected' : '' }}>Grama natural</option>
                                    <option value="Grama sintetica" {{ old('material') == 'Grama sintetica' ? 'selected' : '' }}>Grama sintetica</option>
                                    <option value="Granito" {{ old('material') == 'Granito' ? 'selected' : '' }}>Granito</option>
                                    <option value="Hierro" {{ old('material') == 'Hierro' ? 'selected' : '' }}>Hierro</option>
                                    <option value="Madera" {{ old('material') == 'Madera' ? 'selected' : '' }}>Madera</option>
                                    <option value="Mamposteria" {{ old('material') == 'Mamposteria' ? 'selected' : '' }}>Mamposteria</option>
                                    <option value="Metal" {{ old('material') == 'Metal' ? 'selected' : '' }}>Metal</option>
                                    <option value="Mixto(Madera/Metal)" {{ old('material') == 'Mixto(Madera/Metal)' ? 'selected' : '' }}>Mixto(Madera/Metal)</option>
                                </select>
                                @if ($errors->has('material'))
                                <span class="error text-danger" for="input-material">{{ $errors->first('material') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Material de Superficie') }}</label>
                                <select name="materialsuperficie" id="materialsuperficie" class="form-control">
                                <option value="" selected>Seleccione una opción</option>
                                    <option value="Adoquin arcilla" {{ old('materialsuperficie') == 'Adoquin arcilla' ? 'selected' : '' }}>Adoquin arcilla</option>
                                    <option value="Acero" {{ old('materialsuperficie') == 'Acero' ? 'selected' : '' }}>Acero</option>
                                    <option value="Adoquin ecológico" {{ old('materialsuperficie') == 'Adoquin ecológico' ? 'selected' : '' }}>Adoquin ecológico</option>
                                    <option value="Arena" {{ old('materialsuperficie') == 'Arena' ? 'selected' : '' }}>Arena</option>
                                    <option value="Asfalto con sintetico" {{ old('materialsuperficie') == 'Asfalto con sintetico' ? 'selected' : '' }}>Asfalto con sintetico</option>
                                    <option value="Asfalto sin sintetico" {{ old('materialsuperficie') == 'Asfalto sin sintetico' ? 'selected' : '' }}>Asfalto sin sintetico</option>
                                    <option value="Baldosa" {{ old('materialsuperficie') == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
                                    <option value="Carboncillo" {{ old('materialsuperficie') == 'Carboncillo' ? 'selected' : '' }}>Carboncillo</option>
                                    <option value="Cemento" {{ old('materialsuperficie') == 'Cemento' ? 'selected' : '' }}>Cemento</option>
                                    <option value="Concreto" {{ old('materialsuperficie') == 'Concreto' ? 'selected' : '' }}>Concreto</option>
                                    <option value="Fibra vidrio" {{ old('materialsuperficie') == 'Fibra vidrio' ? 'selected' : '' }}>Fibra vidrio</option>
                                    <option value="Grama natural" {{ old('materialsuperficie') == 'Grama natural' ? 'selected' : '' }}>Grama natural</option>
                                    <option value="Grama sintetica" {{ old('materialsuperficie') == 'Grama sintetica' ? 'selected' : '' }}>Grama sintetica</option>
                                    <option value="Granito" {{ old('materialsuperficie') == 'Granito' ? 'selected' : '' }}>Granito</option>
                                    <option value="Hierro" {{ old('materialsuperficie') == 'Hierro' ? 'selected' : '' }}>Hierro</option>
                                    <option value="Madera" {{ old('materialsuperficie') == 'Madera' ? 'selected' : '' }}>Madera</option>
                                    <option value="Mamposteria" {{ old('materialsuperficie') == 'Mamposteria' ? 'selected' : '' }}>Mamposteria</option>
                                    <option value="Metal" {{ old('materialsuperficie') == 'Metal' ? 'selected' : '' }}>Metal</option>
                                    <option value="Mixto(Madera/Metal)" {{ old('materialsuperficie') == 'Mixto(Madera/Metal)' ? 'selected' : '' }}>Mixto(Madera/Metal)</option>
                                </select>
                                @if ($errors->has('materialsuperficie'))
                                <span class="error text-danger" for="input-materialsuperficie">{{ $errors->first('materialsuperficie') }}</span>
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
                                    <option value="Si" {{ old('iluminacion') == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('iluminacion') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('iluminacion'))
                                <span class="error text-danger" for="input-iluminacion">{{ $errors->first('iluminacion') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Reservable') }}</label>
                                <select name="reservable" id="reservable" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('reservable') == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('reservable') == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('reservable'))
                                <span class="error text-danger" for="input-reservable">{{ $errors->first('reservable') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-control-label">{{ __('Altura') }}</label>
                        <select name="altura" id="altura" class="form-control">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="Ninguno" {{ old('altura') == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                            <option value="Solo metalico (Contraimpacto, malla eslabonada)" {{ old('altura') == 'Solo metalico (Contraimpacto, malla eslabonada)' ? 'selected' : '' }}>Solo metalico (Contraimpacto, malla eslabonada)</option>
                            <option value="Mixto (Mampostería y metalico en malla eslabonada)" {{ old('altura') == 'Mixto (Mampostería y metalico en malla eslabonada)' ? 'selected' : '' }}>Mixto (Mampostería y metalico en malla eslabonada)</option>
                        </select>
                        @if ($errors->has('altura'))
                        <span class="error text-danger" for="input-altura">{{ $errors->first('altura') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Cerramiento') }}</label>
                        <select name="cerramiento" id="cerramiento" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Ninguno" {{ old('cerramiento') == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                            <option value="Total" {{ old('cerramiento') == 'Total' ? 'selected' : '' }}>Total</option>
                        </select>
                        @if ($errors->has('cerramiento'))
                        <span class="error text-danger" for="input-cerramiento">{{ $errors->first('cerramiento') }}</span>
                        @endif
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Largo en metros') }}</label>
                                <input type="number" name="largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo') }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho') }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Area en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" class="form-control" placeholder="{{ __('Area del Parque') }}" value="{{ old('area') }}" autofocus>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Descripcion') }}</label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('Descripcion') }}" value="{{ old('descripcion') }}" autofocus></textarea>
                        @if ($errors->has('descripcion'))
                        <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Estado') }}</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Bueno" {{ old('estado') == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                            <option value="En Mantenimiento" {{ old('estado') == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                            <option value="Fuera de Servicio" {{ old('estado') == 'Fuera de Servicio' ? 'selected' : '' }}>Fuera de Servicio</option>
                        </select>
                        @if ($errors->has('estado'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="{{ route('inventario.busqueda', $parque->id) }}" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection