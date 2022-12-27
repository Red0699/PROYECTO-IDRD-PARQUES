@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Registro de mobiliarios') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('mobiliario.store', $parque->id) }}" autocomplete="off">
                @csrf

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('tipo de mobiliario') }}</label>
                        <select name="tipomobiliario" id="tipomobiliario" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="asadero" {{ old('tipomobiliario') == 'asadero' ? 'selected' : '' }}>asadero</option>
                            <option value="asta de bandera" {{ old('tipomobiliario') == 'asta de bandera' ? 'selected' : '' }}>asta de bandera</option>
                            <option value="banco" {{ old('tipomobiliario') == 'banco' ? 'selected' : '' }}>banco</option>
                            <option value="barandas" {{ old('tipomobiliario') == 'barandas' ? 'selected' : '' }}>barandas</option>
                            <option value="bebederos" {{ old('tipomobiliario') == 'bebederos' ? 'selected' : '' }}>bebederos</option>
                            <option value="bicicletero" {{ old('tipomobiliario') == 'bicicletero' ? 'selected' : '' }}>bicicletero</option>
                            <option value="bolardos" {{ old('tipomobiliario') == 'bolardos' ? 'selected' : '' }}>bolardos</option>
                            <option value="canecas" {{ old('tipomobiliario') == 'canecas' ? 'selected' : '' }}>canecas</option>
                            <option value="ciclo parqueadero" {{ old('tipomobiliario') == 'ciclo parqueadero' ? 'selected' : '' }}>ciclo parqueadero</option>
                            <option value="ciclo ruta" {{ old('tipomobiliario') == 'ciclo ruta' ? 'selected' : '' }}>ciclo ruta</option>
                            <option value="materas" {{ old('tipomobiliario') == 'materas' ? 'selected' : '' }}>materas</option>
                            <option value="valla de proteccion" {{ old('tipomobiliario') == 'valla de proteccion' ? 'selected' : '' }}>valla de proteccion</option>
                            <option value="parqueadero bus" {{ old('tipomobiliario') == 'parqueadero bus' ? 'selected' : '' }}>parqueadero bus</option>
                            <option value="poste iluminaria" {{ old('tipomobiliario') == 'poste iluminaria' ? 'selected' : '' }}>poste iluminaria</option>
                            <option value="señalizacion " {{ old('tipomobiliario') == 'señalizacion ' ? 'selected' : '' }}>señalizacion </option>
                        </select>
                        @if ($errors->has('tipomobiliario'))
                        <span class="error text-danger" for="input-tipomobiliario">{{ $errors->first('tipomobiliario') }}</span>
                        @endif
                    </div>

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

                    <div class="form-group">
                        <label class="form-control-label" for="input-longitud">{{ __('longitud en metros') }}<sup>2</sup></label>
                        <input type="number" name="longitud" class="form-control" placeholder="{{ __('longitud del Parque') }}" value="{{ old('longitud') }}" autofocus>
                        @if ($errors->has('longitud'))
                        <span class="error text-danger" for="input-longitud">{{ $errors->first('longitud') }}</span>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('ubicacion') }}</label>
                        <textarea type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="{{ __('ubicacion') }}" value="{{ old('ubicacion') }}" autofocus></textarea>
                        @if ($errors->has('ubicacion'))
                        <span class="error text-danger" for="input-ubicacion">{{ $errors->first('ubicacion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('estado') }}</label>
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
                        <a href="/inventario" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>


@endsection