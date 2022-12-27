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
                            <option value="" selected>Seleccione una opción</option>
                            <option value="aula multiple" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'aula multiple' ? 'selected' : '' }}>aula multiple</option>
                            <option value="bolera" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'bolera' ? 'selected' : '' }}>bolera</option>
                            <option value="coliseo" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'coliseo' ? 'selected' : '' }}>coliseo</option>
                            <option value="coliseo auxiliar" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'coliseo auxiliar' ? 'selected' : '' }}>coliseo auxiliar</option>
                            <option value="coliceo cubierto" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'coliceo cubierto' ? 'selected' : '' }}>coliceo cubierto</option>
                            <option value="dunt" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'dunt' ? 'selected' : '' }}>dunt</option>
                            <option value="estadio de atletismo" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'estadio de atletismo' ? 'selected' : '' }}>estadio de atletismo</option>
                            <option value="estadio de beisbol" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'estadio de beisbol' ? 'selected' : '' }}>estadio de beisbol</option>
                            <option value="gimnasio aire libre" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'gimnasio aire libre' ? 'selected' : '' }}>gimnasio aire libre</option>
                            <option value="golfito" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'golfito' ? 'selected' : '' }}>golfito</option>
                            <option value="hookey" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'hookey' ? 'selected' : '' }}>hookey</option>
                            <option value="lago" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'lago' ? 'selected' : '' }}>lago</option>
                            <option value="media torta" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'media torta' ? 'selected' : '' }}>media torta</option>
                            <option value="patinaje reacreativo" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'patinaje reacreativo' ? 'selected' : '' }}>patinaje reacreativo</option>
                            <option value="patinodromo" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'patinodromo' ? 'selected' : '' }}>patinodromo</option>
                            <option value="patinaje extremo" {{ old('tipoescenariodeportivo',$escenario->tipoescenariodeportivo) == 'patinaje extremo' ? 'selected' : '' }}>patinaje extremo</option>

                        </select>
                        @if ($errors->has('tipoescenariodeportivo'))
                        <span class="error text-danger" for="input-tipoescenariodeportivo">{{ $errors->first('tipoescenariodeportivo') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Largo en metros') }}</label>
                                <input type="number" name="largo" class="form-control" placeholder="{{ __('Largo') }}" value="{{ old('largo',$escenario->largo) }}" autofocus>
                                @if ($errors->has('largo'))
                                <span class="error text-danger" for="input-largo">{{ $errors->first('largo') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-ancho">{{ __('Ancho en metros') }}</label>
                                <input type="number" name="ancho" class="form-control" placeholder="{{ __('Ancho') }}" value="{{ old('ancho',$escenario->ancho) }}" autofocus>
                                @if ($errors->has('ancho'))
                                <span class="error text-danger" for="input-ancho">{{ $errors->first('ancho') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('area en metros') }}<sup>2</sup></label>
                                <input type="number" name="area" class="form-control" placeholder="{{ __('area del Parque') }}" value="{{ old('area',$escenario->area) }}" autofocus>
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
                                <label class="form-control-label">{{ __('agua') }}</label>
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
                                <label class="form-control-label">{{ __('gas') }}</label>
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
                            <label class="form-control-label">{{ __('camerinos') }}</label>
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
                            <label class="form-control-label" for="input-nbaños">{{ __('numero de baños') }}<sup>2</sup></label>
                            <input type="number" name="nbaños" class="form-control" placeholder="{{ __('nbaños del Parque') }}" value="{{ old('nbaños',$escenario->nbaños) }}" autofocus>
                            @if ($errors->has('nbaños'))
                            <span class="error text-danger" for="input-nbaños">{{ $errors->first('nbaños') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="form-control-label">{{ __('Descripcion') }}</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="{{ __('Descripcion') }}" value="{{ old('descripcion',$escenario->descripcion) }}" autofocus>
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

                    <div class="form-group">
                        <label class="form-control-label">{{ __('ID del Parque') }}</label>
                        <select name="id_parque" id="id_parque" class="form-control">
                            <option value="" selected>Seleccione una opción</option>
                            @foreach($parques as $parque)
                            <option value="{{ $parque->id }}" {{ old('id_parque',$escenario->id_parque) == $parque->id ? 'selected' : '' }}>{{ $parque->nombreParque }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('id_parque'))
                        <span class="error text-danger" for="input-estado">{{ $errors->first('id_parque') }}</span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="/juegos" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection