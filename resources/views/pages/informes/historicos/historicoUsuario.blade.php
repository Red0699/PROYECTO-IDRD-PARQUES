@extends('layouts.app')

@section('content')

@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css"></link>

@endpush

<style>
    table {
        font-size: 10px;
    }

    table thead {}

    .dataTables_filter input {
        background-color: #f2f2f2;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        width: 300px;
        
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Informe de históricos del usuario {{ $user->name }}</h2>

    <div class="card">
        <div class="card-header">
            <form action="{{ route('historico.usuario', $user->id) }}" method="GET">
                <div class="input-daterange datepicker row align-items-center" >
                    <div class="col-md-5">
                        <h5>Fecha Inicio:</h5>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" placeholder="Fecha de Inicio" type="text" value="{{ isset($inicio) ? $inicio : $start }}" id="inicio" name="inicio">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h5>Fecha Fin:</h5>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" placeholder="Fecha de fin" type="text" value="{{ isset($fin) ? $fin : $end }}" id="fin" name="fin">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <!--------------------------------------------- Tablas de Historicos ------------------------------------------->

            <div class="table-responsive m-2">
                <table class="table-bordered table-striped mb-5" id="historicTable">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Codigo Modulo</th>
                            <th>Modulo modificado</th>
                            <th>Codigo Inventario</th>
                            <th>Accion</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th>Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeUsuario as $informe)
                        <tr>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->name }}</td>
                            <td>{{ $informe->id_record }}</td>
                            <td>{{ $informe->tabla }}</td>
                            @if(isset($informe->id_inventario))
                            <td>{{ $informe->id_inventario }}</td>
                            @else
                            <td>NULL</td>
                            @endif
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->campos }}</td>
                            <td>{{ $informe->resultado }}</td>
                            <td>{{ $informe->descripcion }}</td>
                            <td>{{ $informe->created_at }}</td>
                            <td>{{ $informe->updated_at }}</td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="11">Sin registros.</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@push('js')

<script src="/assets-old/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/fonts/Roboto.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#historicTable').DataTable({
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

@endsection