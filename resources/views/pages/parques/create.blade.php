@extends('layouts.app')

@section('content')

<div class="col-xl-11 order-xl-1 py-5">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Registro de Parque') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('parque.store') }}" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="pl-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">{{ __('Nombre del Parque') }}</label>
                        <input type="text" name="nombreParque" class="form-control" placeholder="{{ __('Nombre') }}" autofocus>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-localidad">{{ __('Localidad') }}</label>
                        <select name="localidad" id="localidad" class="form-control">
                            <option selected>Seleccione una opción</option>
                            <option value="1">Antonio Nariño</option>
                            <option value="2">Barrios Unidos</option>
                            <option value="3">Bosa</option>
                            <option value="4">Chapinero</option>
                            <option value="5">Ciudad Bolívar</option>
                            <option value="6">Engativá</option>
                            <option value="7">Fontibón</option>
                            <option value="8">Kennedy</option>
                            <option value="9">La Candelaria</option>
                            <option value="10">Los Mártires</option>
                            <option value="11">Puente Aranda</option>
                            <option value="12">Rafael Uribe Uribe</option>
                            <option value="13">San Cristóbal</option>
                            <option value="14">Santa Fe</option>
                            <option value="15">Suba</option>
                            <option value="16">Sumapaz</option>
                            <option value="17">Teusaquillo</option>
                            <option value="18">Tunjuelito</option>
                            <option value="19">Usaquén</option>
                            <option value="20">Usme</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-area">{{ __('Area en m') }}<sup>2</sup></label>
                                <input type="number" name="area" id="input-area" class="form-control" placeholder="{{ __('Area del Parque') }}" autofocus>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-control-label" for="input-escala">{{ __('Escala') }}</label>
                                <select name="escala" id="escala" class="form-control">
                                    <option selected>Seleccione una opción</option>
                                    <option value="1">Parque de Bolsillo</option>
                                    <option value="2">Parque Metropolitano</option>
                                    <option value="3">Parque Vecinal</option>
                                    <option value="4">Parque Zonal</option>
                                    <option value="5">Parque Regional</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-estrato">{{ __('Estrato') }}</label>
                        <select name="estrato" id="estrato" class="form-control">
                            <option selected>Seleccione una opción</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-direccion">{{ __('Dirección') }}</label>
                        <input type="text" name="direccion" id="input-direccion" class="form-control" placeholder="{{ __('Dirección del Parque') }}" autofocus>
                    </div>

                    <div class="form-group">
                        <label class="form-control-label" for="input-foto">{{ __('Cargar Foto') }}</label>
                        <input type="file" name="foto" class="form-control" id="photo">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                        <a href="/parque" class="btn bg-purple text-white mt-4">Volver</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection