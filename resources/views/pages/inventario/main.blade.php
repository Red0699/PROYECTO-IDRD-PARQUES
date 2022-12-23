@extends('layouts.app')

@section('content')

@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

@endpush

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
                                        <select name="id" id="id" class="form-control">
                                            <option value="" selected>Seleccione una opción</option>
                                            @foreach($parques as $parque)
                                            <option value="{{ $parque->id }}" {{ old('id') == $parque->id ? 'selected' : '' }}>{{ $parque->nombreParque }}</option>
                                            @endforeach
                                        </select>

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
                        <div class="content">

                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="juegos" role="tabpanel" aria-labelledby="juegos-tab">
                                            @include('pages/inventario/juegos/index')
                                        </div>
                                        <div class="tab-pane fade" id="canchas" role="tabpanel" aria-labelledby="canchas-tab">

                                        </div>
                                        <div class="tab-pane fade" id="equipamientos" role="tabpanel" aria-labelledby="equipamientos-tab">

                                        </div>
                                        <div class="tab-pane fade" id="mobiliarios" role="tabpanel" aria-labelledby="mobiliarios-tab">

                                        </div>
                                        <div class="tab-pane fade" id="escenarios" role="tabpanel" aria-labelledby="escenarios-tab">

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