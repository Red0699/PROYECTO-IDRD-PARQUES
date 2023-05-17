@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Editar mobiliario urbano') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('mobiliario.update',$mobiliario->id) }}" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tipo de mobiliario') }}</label>
                        <select name="tipomobiliario" id="tipomobiliario" class="form-control">
                            <option value="" selected>{{ __('Seleccione una opción') }}</option>
                            <option value="Asadero" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Asadero' ? 'selected' : '' }}>{{ __('Asadero') }}</option>
                            <option value="Asta de bandera" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Asta de bandera' ? 'selected' : '' }}>{{ __('Asta de bandera') }}</option>
                            <option value="Banco" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Banco' ? 'selected' : '' }}>{{ __('Banco') }}</option>
                            <option value="Barandas" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Barandas' ? 'selected' : '' }}>{{ __('Barandas') }}</option>
                            <option value="Bebederos" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Bebederos' ? 'selected' : '' }}>{{ __('Bebederos') }}</option>
                            <option value="Bicicletero" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Bicicletero' ? 'selected' : '' }}>{{ __('Bicicletero') }}</option>
                            <option value="Bolardos" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Bolardos' ? 'selected' : '' }}>{{ __('Bolardos') }}</option>
                            <option value="Canecas" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Canecas' ? 'selected' : '' }}>{{ __('Canecas') }}</option>
                            <option value="Ciclo parqueadero" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Ciclo parqueadero' ? 'selected' : '' }}>{{ __('Ciclo parqueadero') }}</option>
                            <option value="Ciclo ruta" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Ciclo ruta' ? 'selected' : '' }}>{{ __('Ciclo ruta') }}</option>
                            <option value="Materas" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Materas' ? 'selected' : '' }}>{{ __('Materas') }}</option>
                            <option value="Valla de protección" {{ old('tipomobiliario', $mobiliario->tipomobiliario) == 'Valla de protección' ? 'selected' : '' }}>{{ __('Valla de protección') }}</option>
                            <option value="Parqueadero bus" {{ old('tipomobiliario',$mobiliario->tipomobiliario) == 'Parqueadero bus' ? 'selected' : '' }}>Parqueadero bus</option>
                            <option value="Poste iluminaria" {{ old('tipomobiliario',$mobiliario->tipomobiliario) == 'Poste iluminaria' ? 'selected' : '' }}>Poste iluminaria</option>
                            <option value="Señalización" {{ old('tipomobiliario',$mobiliario->tipomobiliario) == 'Señalización' ? 'selected' : '' }}>Señalización</option>

                        </select>
                        @if ($errors->has('tipomobiliario'))
                        <span class="error text-danger" for="input-tipomobiliario">{{ $errors->first('tipomobiliario') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Material') }}</label>
                        <select name="material" id="material" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Adoquín arcilla" {{ old('material',$mobiliario->material) == 'Adoquín arcilla' ? 'selected' : '' }}>Adoquín arcilla</option>
                            <option value="Acero" {{ old('material',$mobiliario->material) == 'Acero' ? 'selected' : '' }}>Acero</option>
                            <option value="Adoquín ecológico" {{ old('material',$mobiliario->material) == 'Adoquín ecológico' ? 'selected' : '' }}>Adoquín ecológico</option>
                            <option value="Arena" {{ old('material',$mobiliario->material) == 'Arena' ? 'selected' : '' }}>Arena</option>
                            <option value="Asfalto con sintético" {{ old('material',$mobiliario->material) == 'Asfalto con sintético' ? 'selected' : '' }}>Asfalto con sintético</option>
                            <option value="Asfalto sin sintético" {{ old('material',$mobiliario->material) == 'Asfalto sin sintético' ? 'selected' : '' }}>Asfalto sin sintético</option>
                            <option value="Baldosa" {{ old('material',$mobiliario->material) == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
                            <option value="Carboncillo" {{ old('material',$mobiliario->material) == 'Carboncillo' ? 'selected' : '' }}>Carboncillo</option>
                            <option value="Cemento" {{ old('material',$mobiliario->material) == 'Cemento' ? 'selected' : '' }}>Cemento</option>
                            <option value="Concreto" {{ old('material',$mobiliario->material) == 'Concreto' ? 'selected' : '' }}>Concreto</option>
                            <option value="Fibra vidrio" {{ old('material',$mobiliario->material) == 'Fibra vidrio' ? 'selected' : '' }}>Fibra vidrio</option>
                            <option value="Grama natural" {{ old('material',$mobiliario->material) == 'Grama natural' ? 'selected' : '' }}>Grama natural</option>
                            <option value="Grama sintética" {{ old('material',$mobiliario->material) == 'Grama sintética' ? 'selected' : '' }}>Grama sintética</option>
                            <option value="Granito" {{ old('material',$mobiliario->material) == 'Granito' ? 'selected' : '' }}>Granito</option>
                            <option value="Hierro" {{ old('material',$mobiliario->material) == 'Hierro' ? 'selected' : '' }}>Hierro</option>
                            <option value="Madera" {{ old('material',$mobiliario->material) == 'Madera' ? 'selected' : '' }}>Madera</option>
                            <option value="Mampostería" {{ old('material',$mobiliario->material) == 'Mampostería' ? 'selected' : '' }}>Mampostería</option>
                            <option value="Metal" {{ old('material',$mobiliario->material) == 'Metal' ? 'selected' : '' }}>Metal</option>
                            <option value="Mixto(Madera/Metal)" {{ old('material',$mobiliario->material) == 'Mixto(Madera/Metal)' ? 'selected' : '' }}>Mixto(Madera/Metal)</option>
                        </select>
                        @if ($errors->has('material'))
                        <span class="error text-danger" for="input-material">{{ $errors->first('material') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-longitud">{{ __('Longitud en metros') }}</label>
                        <input type="number" name="longitud" class="form-control" placeholder="{{ __('Longitud del Parque') }}" value="{{ old('longitud',$mobiliario->longitud) }}" autofocus>
                        @if ($errors->has('longitud'))
                        <span class="error text-danger" for="input-longitud">{{ $errors->first('longitud') }}</span>
                        @endif
                    </div>


                    <div class="form-group">
                        <label class="form-control-label">{{ __('Ubicación') }}</label>
                        <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="{{ __('ubicación') }}" value="{{ old('ubicacion',$mobiliario->ubicacion) }}" autofocus>
                        @if ($errors->has('ubicacion'))
                        <span class="error text-danger" for="input-ubicacion">{{ $errors->first('ubicacion') }}</span>
                        @endif

                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Estado') }}</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Bueno" {{ old('estado',$mobiliario->estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                            <option value="En Mantenimiento" {{ old('estado',$mobiliario->estado) == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                            <option value="Fuera de Servicio" {{ old('estado',$mobiliario->estado) == 'Fuera de Servicio' ? 'selected' : '' }}>Fuera de Servicio</option>
                        </select>
                        @if ($errors->has('estado'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="{{ route('inventario.busqueda', $mobiliario->idparque) }}" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection