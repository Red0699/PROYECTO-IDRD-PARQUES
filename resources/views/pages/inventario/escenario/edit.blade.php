@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Registro de escenario deportivo') }}</h3>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('escenario.update',$escenario->id) }}" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Tipo de escenario deportivo') }}</label>
                        <select name="tipoescenariodeportivo" id="tipoescenariodeportivo" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Aula multiple" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Aula multiple' ? 'selected' : '' }}>Aula múltiple</option>
                            <option value="Bolera" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Bolera' ? 'selected' : '' }}>Bolera</option>
                            <option value="Coliseo" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Coliseo' ? 'selected' : '' }}>Coliseo</option>
                            <option value="Coliseo auxiliar" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Coliseo auxiliar' ? 'selected' : '' }}>Coliseo auxiliar</option>
                            <option value="Coliseo cubierto" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Coliseo cubierto' ? 'selected' : '' }}>Coliseo cubierto</option>
                            <option value="Dunt" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Dunt' ? 'selected' : '' }}>Dunt</option>
                            <option value="Estadio de atletismo" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Estadio de atletismo' ? 'selected' : '' }}>Estadio de atletismo</option>
                            <option value="Estadio de béisbol" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Estadio de béisbol' ? 'selected' : '' }}>Estadio de béisbol</option>
                            <option value="Gimnasio aire libre" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Gimnasio aire libre' ? 'selected' : '' }}>Gimnasio aire libre</option>
                            <option value="Golfito" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Golfito' ? 'selected' : '' }}>Golfito</option>
                            <option value="Hookey" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Hookey' ? 'selected' : '' }}>Hookey</option>
                            <option value="Lago" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Lago' ? 'selected' : '' }}>Lago</option>
                            <option value="Media torta" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Media torta' ? 'selected' : '' }}>Media torta</option>
                            <option value="Patinaje recreativo" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Patinaje recreativo' ? 'selected' : '' }}>Patinaje recreativo</option>
                            <option value="Patinódromo" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Patinódromo' ? 'selected' : '' }}>Patinódromo</option>
                            <option value="Patinaje extremo" {{ old('tipoescenariodeportivo', $escenario->tipoescenariodeportivo) == 'Patinaje extremo' ? 'selected' : '' }}>Patinaje extremo</option>
                        </select>
                        @if ($errors->has('tipoescenariodeportivo'))
                        <span class="error text-danger" for="input-tipoescenariodeportivo">{{ $errors->first('tipoescenariodeportivo') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Largo en metros') }}</label>
                                <input type="number" name="largo" id="input-largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo', $escenario->largo) }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" id="input-ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho', $escenario->ancho) }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Área en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" id="input-area" class="form-control" placeholder="{{ __('Área del Parque') }}" value="{{ old('area', $escenario->area) }}" autofocus readonly>
                                @if ($errors->has('area'))
                                <span class="error text-danger" for="input-area">{{ $errors->first('area') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <script>
                        // Calcular el área en tiempo real
                        document.getElementById('input-largo').addEventListener('input', calcularArea);
                        document.getElementById('input-ancho').addEventListener('input', calcularArea);

                        function calcularArea() {
                            const largo = parseFloat(document.getElementById('input-largo').value);
                            const ancho = parseFloat(document.getElementById('input-ancho').value);
                            const area = largo * ancho;
                            if (!isNaN(area)) {
                                document.getElementById('input-area').value = area.toFixed(2);
                            } else {
                                document.getElementById('input-area').value = '';
                            }
                        }
                    </script>



                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label">{{ __('Luz') }}</label>
                                <select name="luz" id="luz" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>
                                    <option value="Si" {{ old('luz',$escenario->luz) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('luz',$escenario->luz) == 'No' ? 'selected' : '' }}>No</option>
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
                                    <option value="Si" {{ old('agua',$escenario->agua) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('agua',$escenario->agua) == 'No' ? 'selected' : '' }}>No</option>
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
                                    <option value="Si" {{ old('gas',$escenario->gas) == 'Si' ? 'selected' : '' }}>Si</option>
                                    <option value="No" {{ old('gas',$escenario->gas) == 'No' ? 'selected' : '' }}>No</option>
                                </select>
                                @if ($errors->has('gas'))
                                <span class="error text-danger" for="input-gas">{{ $errors->first('gas') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">{{ __('Camerinos') }}</label>
                            <select name="camerinos" id="camerinos" class="form-control">
                                <option value="" selected>Seleccione una opción</option>
                                <option value="Si" {{ old('camerinos',$escenario->camerinos) == 'Si' ? 'selected' : '' }}>Si</option>
                                <option value="No" {{ old('camerinos',$escenario->camerinos) == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            @if ($errors->has('camerinos'))
                            <span class="error text-danger" for="input-camerinos">{{ $errors->first('camerinos') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Cerramiento') }}</label>
                        <select name="cerramiento" id="cerramiento" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Ninguno" {{ old('cerramiento',$escenario->cerramiento) == 'Ninguno' ? 'selected' : '' }}>Ninguno</option>
                            <option value="Total" {{ old('cerramiento',$escenario->cerramiento) == 'Total' ? 'selected' : '' }}>Total</option>
                        </select>
                        @if ($errors->has('cerramiento'))
                        <span class="error text-danger" for="input-cerramiento">{{ $errors->first('cerramiento') }}</span>
                        @endif
                    </div>

                    <div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-nbaños">{{ __('Número de baños') }}</label>
                            <input type="number" name="nbaños" class="form-control" placeholder="{{ __('Ejemplo: 123') }}" value="{{ old('nbaños',$escenario->nbaños) }}" autofocus>
                            @if ($errors->has('nbaños'))
                            <span class="error text-danger" for="input-nbaños">{{ $errors->first('nbaños') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-control-label">{{ __('Descripción') }}</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('Ingrese texto') }}" value="{{ old('descripcion',$escenario->descripcion) }}" autofocus>
                        @if ($errors->has('descripcion'))
                        <span class="error text-danger" for="input-descripcion">{{ $errors->first('descripcion') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">{{ __('Estado') }}</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            <option value="Bueno" {{ old('estado',$escenario->estado) == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                            <option value="En Mantenimiento" {{ old('estado',$escenario->estado) == 'En Mantenimiento' ? 'selected' : '' }}>En Mantenimiento</option>
                            <option value="Fuera de Servicio" {{ old('estado',$escenario->estado) == 'Fuera de Servicio' ? 'selected' : '' }}>Fuera de Servicio</option>
                        </select>
                        @if ($errors->has('estado'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="{{ route('inventario.busqueda', $escenario->id_parque ) }}" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection