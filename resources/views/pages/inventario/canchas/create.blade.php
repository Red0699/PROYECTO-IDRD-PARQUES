@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Registro de Cancha Deportiva') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('cancha.store', $parque->id) }}" autocomplete="off">
                @csrf

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tipo de Cancha Deportiva') }}</label>
                        <select name="tipocancha" id="tipocancha" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Arcos" {{ old('tipocancha') == 'Arcos' ? 'selected' : '' }}>Arcos</option>
                            <option value="Baloncesto" {{ old('tipocancha') == 'Baloncesto' ? 'selected' : '' }}>Baloncesto</option>
                            <option value="Banquitas" {{ old('tipocancha') == 'Banquitas' ? 'selected' : '' }}>Banquitas</option>
                            <option value="Béisbol" {{ old('tipocancha') == 'Béisbol' ? 'selected' : '' }}>Béisbol</option>
                            <option value="Canchas múltiples" {{ old('tipocancha') == 'Canchas múltiples' ? 'selected' : '' }}>Canchas múltiples</option>
                            <option value="Frontón" {{ old('tipocancha') == 'Frontón' ? 'selected' : '' }}>Frontón</option>
                            <option value="Fútbol" {{ old('tipocancha') == 'Fútbol' ? 'selected' : '' }}>Fútbol</option>
                            <option value="Microfútbol" {{ old('tipocancha') == 'Microfútbol' ? 'selected' : '' }}>Microfútbol</option>
                            <option value="Mini baloncesto" {{ old('tipocancha') == 'Mini baloncesto' ? 'selected' : '' }}>Mini baloncesto</option>
                            <option value="Mini tejo" {{ old('tipocancha') == 'Mini tejo' ? 'selected' : '' }}>Mini tejo</option>
                            <option value="Mini tenis" {{ old('tipocancha') == 'Mini tenis' ? 'selected' : '' }}>Mini tenis</option>
                            <option value="Mini voleibol" {{ old('tipocancha') == 'Mini voleibol' ? 'selected' : '' }}>Mini voleibol</option>
                            <option value="Otra cancha deportiva" {{ old('tipocancha') == 'Otra cancha deportiva' ? 'selected' : '' }}>Otra cancha deportiva</option>
                            <option value="Squash" {{ old('tipocancha') == 'Squash' ? 'selected' : '' }}>Squash</option>
                            <option value="Tablero" {{ old('tipocancha') == 'Tablero' ? 'selected' : '' }}>Tablero</option>
                            <option value="Tejo" {{ old('tipocancha') == 'Tejo' ? 'selected' : '' }}>Tejo</option>
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
                                    <option value="Adoquín arcilla" {{ old('material') == 'Adoquín arcilla' ? 'selected' : '' }}>Adoquín arcilla</option>
                                    <option value="Acero" {{ old('material') == 'Acero' ? 'selected' : '' }}>Acero</option>
                                    <option value="Adoquín ecológico" {{ old('material') == 'Adoquín ecológico' ? 'selected' : '' }}>Adoquín ecológico</option>
                                    <option value="Arena" {{ old('material') == 'Arena' ? 'selected' : '' }}>Arena</option>
                                    <option value="Asfalto con sintético" {{ old('material') == 'Asfalto con sintético' ? 'selected' : '' }}>Asfalto con sintético</option>
                                    <option value="Asfalto sin sintético" {{ old('material') == 'Asfalto sin sintético' ? 'selected' : '' }}>Asfalto sin sintético</option>
                                    <option value="Baldosa" {{ old('material') == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
                                    <option value="Carboncillo" {{ old('material') == 'Carboncillo' ? 'selected' : '' }}>Carboncillo</option>
                                    <option value="Cemento" {{ old('material') == 'Cemento' ? 'selected' : '' }}>Cemento</option>
                                    <option value="Concreto" {{ old('material') == 'Concreto' ? 'selected' : '' }}>Concreto</option>
                                    <option value="Fibra vidrio" {{ old('material') == 'Fibra vidrio' ? 'selected' : '' }}>Fibra vidrio</option>
                                    <option value="Grama natural" {{ old('material') == 'Grama natural' ? 'selected' : '' }}>Grama natural</option>
                                    <option value="Grama sintética" {{ old('material') == 'Grama sintética' ? 'selected' : '' }}>Grama sintética</option>
                                    <option value="Granito" {{ old('material') == 'Granito' ? 'selected' : '' }}>Granito</option>
                                    <option value="Hierro" {{ old('material') == 'Hierro' ? 'selected' : '' }}>Hierro</option>
                                    <option value="Madera" {{ old('material') == 'Madera' ? 'selected' : '' }}>Madera</option>
                                    <option value="Mampostería" {{ old('material') == 'Mampostería' ? 'selected' : '' }}>Mampostería</option>
                                    <option value="Metal" {{ old('material') == 'Metal' ? 'selected' : '' }}>Metal</option>
                                    <option value="Mixto (Madera/Metal)" {{ old('material') == 'Mixto (Madera/Metal)' ? 'selected' : '' }}>Mixto (Madera/Metal)</option>
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
                                <label class="form-control-label">{{ __('Camerino') }}</label>
                                <select name="camerino" id="camerino" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('camerino') == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('camerino') == 'No' ? 'selected' : '' }}>No</option>
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
                                <input type="number" name="largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo') }}" onchange="calcularArea()" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho') }}" onchange="calcularArea()" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Área en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" id="area" class="form-control" placeholder="{{ __('Área del Parque') }}" value="{{ old('area') }}" readonly>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <script>
                        function calcularArea() {
                            var largo = parseFloat(document.getElementsByName('largo')[0].value);
                            var ancho = parseFloat(document.getElementsByName('ancho')[0].value);
                            var area = largo * ancho;
                            document.getElementById('area').value = area;
                        }
                    </script>



                    <div class="form-group">
                        <label class="form-control-label">{{ __('Descripción') }}</label>
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
                        <a href="{{ route('inventario.busqueda', $parque->id ) }}" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection