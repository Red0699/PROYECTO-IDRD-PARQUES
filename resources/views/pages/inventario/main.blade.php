@extends('layouts.app')

@section('content')



@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('argon/css/main.css')}}">
@endpush

<!-- Título de la página -->
<div class="container-fluid bg-purple py-8 text-white">
    <div class="row">
        <div class="col-md-12 text-center mt--6">
            <h1 class="text-white">Administración de inventario de los parques</h1>
            <p class="text-white mt-4">En esta plataforma podrás gestionar y controlar el inventario de recursos de los parques, incluyendo canchas deportivas, mobiliarios urbanos, escenarios deportivos, juegos infantiles y equipamientos. Mantén un registro actualizado de los recursos disponibles y optimiza su uso para ofrecer la mejor experiencia a los usuarios de los parques.</p>
        </div>
    </div>
</div>

<div class="content mt--9">
    <div class="container-fluid mt-5" >
        <div class="row">
            <div class="col-md-13" id="contenedor-principal">

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
                            <p>Búsqueda por parque</p>
                        </div>
                    </div>
                </div>


                <!-- Contenedor de información del parque -->

                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <h2 class="text-center">Información General: </h2>
                        <div class="col-md-11 contenedor">

                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nombre:</strong> {{ $data->nombreParque }}</p>
                                    <p><strong>Localidad:</strong> {{ $data->localidad }}</p>
                                    <p><strong>Escala:</strong> {{ $data->escala }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Área:</strong> {{ $data->area }}m<sup>2</sup></p>
                                    <p><strong>Dirección:</strong> {{ $data->direccion }}</p>
                                    <p><strong>Estrato:</strong> {{ $data->estrato }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido de información del inventario -->

                <div class="container">
                    <div class="row justify-content-center mb-5">
                        <h2 class="text-center">Información de Inventario:</h2>
                        <div class="col-md-11 contenedor">

                            <div class="row">
                                <div class="col-md-4">
                                    <p><strong>Usuario que modificó el inventario:</strong>{{ $historico->user->name }}</p>
                                    <p><strong>Última actualización</strong>{{ $historico->updated_at }}</p>

                                </div>
                                <div class="col-md-4">
                                    <p><strong>Persona que realizó el inventario: </strong>{{ $historicoAntiguo->user->name }}</p>
                                    <p><strong>Última visita de inventario: </strong>{{ $historico->updated_at }}</p>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn bg-purple text-white" href="{{ route('historico.index', $data->id) }}">Históricos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Tablas -->

                <div class="row justify-content-between mb-0 py-3">
                    <div class="col-md-5">
                        <a class="btn bg-purple text-white" href="{{ route('inventario.informe') }}">Informe Inventario</a>
                        <a class="btn bg-purple text-white" href="{{ route('diagnostico.index', ['parque_id' => $dataTemp]) }}">Ver Diagnóstico</a>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-juegos-tab" data-toggle="tab" href="#nav-juegos" role="tab" aria-controls="nav-juegos" aria-selected="true">Juegos Infantiles</a>
                                    <a class="nav-item nav-link" id="nav-canchas-tab" data-toggle="tab" href="#nav-canchas" role="tab" aria-controls="nav-canchas" aria-selected="false">Canchas Deportivas</a>
                                    <a class="nav-item nav-link" id="nav-equipamientos-tab" data-toggle="tab" href="#nav-equipamientos" role="tab" aria-controls="nav-equipamientos" aria-selected="false">Equipamientos</a>
                                    <a class="nav-item nav-link" id="nav-mobiliarios-tab" data-toggle="tab" href="#nav-mobiliarios" role="tab" aria-controls="nav-mobiliarios" aria-selected="false">Mobiliarios Urbanos</a>
                                    <a class="nav-item nav-link" id="nav-escenarios-tab" data-toggle="tab" href="#nav-escenarios" role="tab" aria-controls="nav-escenarios" aria-selected="false">Escenarios Deportivos</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-juegos" role="tabpanel" aria-labelledby="nav-juegos-tab">
                                    @include('pages/inventario/juegos/index', ['bandera' => 'activo'])
                                </div>
                                <div class="tab-pane fade" id="nav-canchas" role="tabpanel" aria-labelledby="nav-canchas-tab">
                                    @include('pages/inventario/canchas/index', ['bandera' => 'activo']) </div>
                                <div class="tab-pane fade" id="nav-equipamientos" role="tabpanel" aria-labelledby="nav-equipamientos-tab">
                                    @include('pages/inventario/equipamiento/index', ['bandera' => 'activo']) </div>
                                <div class="tab-pane fade" id="nav-mobiliarios" role="tabpanel" aria-labelledby="nav-mobiliarios-tab">
                                    @include('pages/inventario/mobiliario/index', ['bandera' => 'activo']) </div>
                                <div class="tab-pane fade" id="nav-escenarios" role="tabpanel" aria-labelledby="nav-escenarios-tab">
                                    @include('pages/inventario/escenario/index', ['bandera' => 'activo']) </div>
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

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/fonts/Roboto.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"></script>


<script>
    $(document).ready(function() {
        $('#invTable').DataTable({
            "scrollY": true,
            "scrollX": true,
            "scrollCollapse": true,
            "paging": true,
            "ordering": true,
            "searching": true,
            "info": true,
            dom: 'Bfrtip',
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            language: {
                lengthMenu: 'Mostrando _MENU_ registros por página',
                zeroRecords: 'No hay registros para mostrar',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'No hay registros...',
                infoFiltered: '(filtrando de _MAX_ registros disponibles)',
                sSearch: 'Buscar',
                'paginate': {
                    'previous': '<i class="fas fa-light fa-arrow-left"></i>',
                    'next': '<i class="fas fa-light fa-arrow-right"></i>'
                },
                buttons: {
                    pageLength: 'Mostrando %d filas'
                },
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#canchaTable').DataTable({
            "scrollY": true,
            "scrollX": true,
            "scrollCollapse": true,
            "paging": true,
            "ordering": true,
            "searching": true,
            "info": true,
            dom: 'Bfrtip',
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            language: {
                lengthMenu: 'Mostrando _MENU_ registros por página',
                zeroRecords: 'No hay registros para mostrar',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'No hay registros...',
                infoFiltered: '(filtrando de _MAX_ registros disponibles)',
                sSearch: 'Buscar',
                'paginate': {
                    'previous': '<i class="fas fa-light fa-arrow-left"></i>',
                    'next': '<i class="fas fa-light fa-arrow-right"></i>'
                },
                buttons: {
                    pageLength: 'Mostrando %d filas'
                },
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#equipamientoTable').DataTable({
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#mobiliarioTable').DataTable({
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#escenarioTable').DataTable({
            "scrollY": true,
            "scrollX": true,
            "scrollCollapse": true,
            "paging": true,
            "ordering": true,
            "searching": true,
            "info": true,
            dom: 'Bfrtip',
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            language: {
                lengthMenu: 'Mostrando _MENU_ registros por página',
                zeroRecords: 'No hay registros para mostrar',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'No hay registros...',
                infoFiltered: '(filtrando de _MAX_ registros disponibles)',
                sSearch: 'Buscar',
                'paginate': {
                    'previous': '<i class="fas fa-light fa-arrow-left"></i>',
                    'next': '<i class="fas fa-light fa-arrow-right"></i>'
                },
                buttons: {
                    pageLength: 'Mostrando %d filas'
                },
            },
        });
    });
</script>

@endpush