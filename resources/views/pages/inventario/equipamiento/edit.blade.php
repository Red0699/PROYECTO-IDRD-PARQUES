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
                        <label class="form-control-label">{{ __('Módulo') }}</label>
                        <select name="modulo" id="modulo" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Asadero" {{ old('modulo', $equipamiento->modulo) == 'Asadero' ? 'selected' : '' }}>Asadero</option>
                            <option value="Auditorio" {{ old('modulo', $equipamiento->modulo) == 'Auditorio' ? 'selected' : '' }}>Auditorio</option>
                            <option value="Baños" {{ old('modulo', $equipamiento->modulo) == 'Baños' ? 'selected' : '' }}>Baños</option>
                            <option value="Baterías sanitarias" {{ old('modulo', $equipamiento->modulo) == 'Baterías sanitarias' ? 'selected' : '' }}>Baterías sanitarias</option>
                            <option value="Bodegas" {{ old('modulo', $equipamiento->modulo) == 'Bodegas' ? 'selected' : '' }}>Bodegas</option>
                            <option value="Cafetería" {{ old('modulo', $equipamiento->modulo) == 'Cafetería' ? 'selected' : '' }}>Cafetería</option>
                            <option value="CAI" {{ old('modulo', $equipamiento->modulo) == 'CAI' ? 'selected' : '' }}>CAI</option>
                            <option value="Camerino" {{ old('modulo', $equipamiento->modulo) == 'Camerino' ? 'selected' : '' }}>Camerino</option>
                            <option value="Caseta" {{ old('modulo', $equipamiento->modulo) == 'Caseta' ? 'selected' : '' }}>Caseta</option>
                            <option value="Cicloruta" {{ old('modulo', $equipamiento->modulo) == 'Cicloruta' ? 'selected' : '' }}>Cicloruta</option>
                            <option value="Concha acústica" {{ old('modulo', $equipamiento->modulo) == 'Concha acústica' ? 'selected' : '' }}>Concha acústica</option>
                            <option value="Iglesias" {{ old('modulo', $equipamiento->modulo) == 'Iglesias' ? 'selected' : '' }}>Iglesias</option>
                            <option value="Gradas" {{ old('modulo', $equipamiento->modulo) == 'Gradas' ? 'selected' : '' }}>Gradas</option>
                            <option value="Locales" {{ old('modulo', $equipamiento->modulo) == 'Locales' ? 'selected' : '' }}>Locales</option>
                        </select>
                        @if ($errors->has('modulo'))
                        <span class="error text-danger" for="input-modulo">{{ $errors->first('modulo') }}</span>
                        @endif
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-largo">{{ __('Largo en metros') }}</label>
                                <input type="number" name="largo" id="input-largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo', $equipamiento->largo) }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" id="input-ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho', $equipamiento->ancho) }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Área en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" id="input-area" class="form-control" placeholder="{{ __('Área del Parque') }}" value="{{ old('area', $equipamiento->area) }}" readonly>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <script>
                        // Calcular el área automáticamente al modificar el largo o ancho
                        var inputLargo = document.getElementById('input-largo');
                        var inputAncho = document.getElementById('input-ancho');
                        var inputArea = document.getElementById('input-area');

                        inputLargo.addEventListener('input', calcularArea);
                        inputAncho.addEventListener('input', calcularArea);

                        function calcularArea() {
                            var largo = inputLargo.value;
                            var ancho = inputAncho.value;
                            var area = largo * ancho;
                            inputArea.value = area;
                        }
                    </script>




                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Luz') }}</label>
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
                                <label class="form-control-label">{{ __('Agua') }}</label>
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
                                <label class="form-control-label">{{ __('Gas') }}</label>
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
                        <label class="form-control-label">{{ __('Descripción') }}</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('Ingrese texto') }}" value="{{ old('descripcion',$equipamiento->descripcion) }}" autofocus>
                        @if ($errors->has('descripcion'))
                        <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Estado') }}</label>
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
                        <a href="{{ route('inventario.busqueda', $equipamiento->idparque) }}" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>

@endsection