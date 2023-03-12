@extends('layouts.app')

@section('content')



@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

@endpush

<style>
    #contenedor-principal {
        border: 1px solid gray;
        background-color: white;
        padding: 10px;
        margin: 0 auto;
        max-width: 1000px;
        /* ancho máximo */
        text-align: center;
    }

    .contenedor {
        border: 1px solid gray;
        background-color: white;
        padding: 20px;
        margin-bottom: 10px;
    }

    .busqueda {
        background-color: white;
        padding: 30px;
        margin-bottom: 20px;
    }

    .contenedor-tabs {
        border: 1px solid gray;
        background-color: white;
        padding: 10px;
        margin-bottom: 20px;
    }

    .select-lg {
        padding-right: 50px;
    }

    .btn-busqueda {
        margin-left: 20px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .search-text {
        text-align: left;
        margin-top: 10px;
        padding-top: -10px;
    }

    .search-text p {
        color: #999999;
        font-size: 12px;
        margin-bottom: 0;
        
    }
</style>

<div class="content py-2">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12" id="contenedor-principal">

                <!-- Contenedor de Busqueda -->

                <div class="row justify-content-center">
                    <div class="col-md-11 col-lg-11 busqueda">

                        <form action="{{ route('inventario') }}" method="get">
                            @csrf

                            <div class="input-group mb-2">

                                <select name="id" id="id" class="form-control select-lg">
                                    @foreach($parques as $parque)
                                    <option value="{{ $parque->id }}" {{ $dataTemp == $parque->id ? 'selected' : '' }}>{{ $parque->nombreParque }}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary btn-busqueda">
                                    <i class="fas fa-search"></i>
                                </button>

                            </div>
                        </form>
                        <hr class="my-2" style="border-top: 2px solid #ccc;">
                        <div class="search-text ">
                            <p>Busqueda por parque</p>
                        </div>
                    </div>
                </div>


                <!-- Contenedor de información del parque -->

                <div class="row justify-content-center mb-5">
                <h2 class="text-center">Información General </h2>
                    <div class="col-md-11 contenedor">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nombre:</strong> {{ $parque->nombreParque }}</p>
                                <p><strong>Localidad:</strong> {{ $parque->localidad }}</p>
                                <p><strong>Escala:</strong> {{ $parque->escala }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Área:</strong> Área aproximada del parque</p>
                                <p><strong>Dirección:</strong> {{ $parque->direccion }}</p>
                                <p><strong>Estrato:</strong> {{ $parque->estrato }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Tablas -->

                <div class="row justify-content-between mb-0 py-3">
                    <div class="col-md-5">
                        <button class="btn bg-purple text-white btn-sm">Informe Inventario</button>
                        <button class="btn bg-purple text-white btn-sm">Informe Diagnostico</button>
                    </div>
                </div>

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

@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/fonts/Roboto.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

@endpush

@endsection