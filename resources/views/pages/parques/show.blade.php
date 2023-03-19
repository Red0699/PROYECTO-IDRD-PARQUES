@extends('layouts.app')

@section('content')

<style>
    .card {
        margin: 10px;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 40px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .card-text {
        font-size: 15px;
        margin-bottom: 10px;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
        max-height: 100%;
    }

    .rounded-left {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .contenedor-tabs {
        border: 2px solid #F3F2F2;
        background-color: white;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 10px;
    }
</style>

<div class="content py-5">
    <div class="container-fluid">
        <div class="card">
            <!-- Contenedor Recursos del parque -->
            <div class="row">
                <div class="col-md-7 ">
                    <h5 class="text-center">Foto del parque</h5>
                    <img src="{{ asset('images/parques').'/'.$parque->foto }}" alt="Foto de Parque" class="img-fluid rounded-left">
                </div>
                <div class="col-md-5">
                    <h5 class="text-center">Información del parque</h5>
                    <div class="card-body">
                        <h1 class="card-title text-center">Parque {{ $parque->nombreParque }}</h1>
                        <p class="card-text"><strong>Dirección:</strong> {{ $parque->direccion }}</p>
                        <p class="card-text"><strong>Localidad:</strong> {{ $parque->localidad }}</p>
                        <p class="card-text"><strong>Estrato:</strong> {{ $parque->estrato }}</p>
                        <p class="card-text"><strong>Escala:</strong> {{ $parque->escala }}</p>
                        <p class="card-text"><strong>Area:</strong> {{ $parque->area }}m<sup>2</sup></p>
                        <p class="card-text"><strong>Descripción:</strong></p>
                    </div>
                </div>
            </div>

            <!-- Contenedor tablas de inventario del parque" -->
            <div class="container py-5">
                <h2 class="text-center">Recursos del parque</h2>
                <div class="row justify-content-center">
                    <div class="col-md-11 contenedor-tabs">
                        <div class="tabs">
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active " id="juegos-tab" data-toggle="tab" href="#juegos" role="tab" aria-controls="juegos" aria-selected="true">Juegos Infantiles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="canchas-tab" data-toggle="tab" href="#canchas" role="tab" aria-controls="canchas" aria-selected="false">Canchas Deportivas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="equipamientos-tab" data-toggle="tab" href="#equipamientos" role="tab" aria-controls="equipamientos" aria-selected="false">Equipamientos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="mobiliarios-tab" data-toggle="tab" href="#mobiliarios" role="tab" aria-controls="mobiliarios" aria-selected="false">Mobiliarios Urbanos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="escenarios-tab" data-toggle="tab" href="#escenarios" role="tab" aria-controls="escenarios" aria-selected="false">Escenarios Deportivos</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card shadow border">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="juegos" role="tabpanel" aria-labelledby="juegos-tab">
                                            @include('pages/inventario/juegos/index')
                                        </div>
                                        <div class="tab-pane fade" id="canchas" role="tabpanel" aria-labelledby="canchas-tab">
                                            @include('pages/inventario/canchas/index')
                                        </div>
                                        <div class="tab-pane fade" id="equipamientos" role="tabpanel" aria-labelledby="equipamientos-tab">
                                            @include('pages/inventario/equipamiento/index')
                                        </div>
                                        <div class="tab-pane fade" id="mobiliarios" role="tabpanel" aria-labelledby="mobiliarios-tab">
                                            @include('pages/inventario/mobiliario/index')
                                        </div>
                                        <div class="tab-pane fade" id="escenarios" role="tabpanel" aria-labelledby="escenarios-tab">
                                            @include('pages/inventario/escenario/index')
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