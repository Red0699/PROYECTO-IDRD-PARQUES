@extends('layouts.app')

@section('content')

<div class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Card de Busqueda -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card borde">

                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Prueba">

                                    </div>
                                    <div class="col">
                                        <button class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Card Tablas -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="wrapper">
                                    <input class="radio" id="one" name="group" type="radio" src="{{ route('juegos.index') }}" checked>
                                    <input class="radio" id="two" name="group" type="radio">
                                    <input class="radio" id="three" name="group" type="radio">
                                    <input class="radio" id="four" name="group" type="radio">
                                    <input class="radio" id="five" name="group" type="radio">
                                    <div class="tabs">
                                        <label class="tab" id="one-tab" for="one">Juegos Infantiles</label>
                                        <label class="tab" id="two-tab" for="two">Canchas Deportivas</label>
                                        <label class="tab" id="three-tab" for="three">Escenarios Deportivos</label>
                                        <label class="tab" id="four-tab" for="four">Equipamientos</label>
                                        <label class="tab" id="five-tab" for="five">Mobiliarios Urbanos</label>
                                    </div>

                                    <div class="panels">
                                        <div class="panel" id="one-panel">
                                            @include('pages/inventario/juegos/index')
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection