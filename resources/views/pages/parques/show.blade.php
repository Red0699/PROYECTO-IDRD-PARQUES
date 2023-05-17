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

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('argon/css/main.css')}}">
@endpush

<div class="content py-5">
    <div class="container-fluid">
        <div class="card">
            <!-- Contenedor Recursos del parque -->
            <div class="row">
                <div class="col-md-7 ">
                    <h5 class="text-center">Foto del parque</h5>
                    @if($parque->foto)
                    <img src="{{ asset('images/parques').'/'.$parque->foto }}" alt="Foto de Parque" class="img-fluid rounded-left">
                    @else
                    <img src="{{ asset('argon/img/brand/default-parque.avif') }}" alt="Foto de Parque" class="img-fluid rounded-left">
                    @endif
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
                                @include('pages.inventario.juegos.index', ['bandera' => 'desactivado'])
                            </div>
                            <div class="tab-pane fade" id="nav-canchas" role="tabpanel" aria-labelledby="nav-canchas-tab">
                                @include('pages/inventario/canchas/index', ['bandera' => 'desactivado']) </div>
                            <div class="tab-pane fade" id="nav-equipamientos" role="tabpanel" aria-labelledby="nav-equipamientos-tab">
                                @include('pages/inventario/equipamiento/index', ['bandera' => 'desactivado']) </div>
                            <div class="tab-pane fade" id="nav-mobiliarios" role="tabpanel" aria-labelledby="nav-mobiliarios-tab">
                                @include('pages/inventario/mobiliario/index', ['bandera' => 'desactivado']) </div>
                            <div class="tab-pane fade" id="nav-escenarios" role="tabpanel" aria-labelledby="nav-escenarios-tab">
                                @include('pages/inventario/escenario/index', ['bandera' => 'desactivado']) </div>
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