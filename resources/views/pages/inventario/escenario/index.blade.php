@extends('layouts.app')

@section('content')
<div class="content py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">escenarios deportivos</h4>
                                <p class="card-category">escenarios registrados</p>
                                <div class="col-12 text-right">

                                    <a type="button" class="btn btn-primary" href="{{ url('/escenario/create') }}">Añadir escenario deportivo</a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                </div>
                                <div class="table-responsive m-2">
                                    <table class="table" id="escenarioTable">
                                        <thead class="thead-light">
                                            <th>tipoescenariodeportivo</th>
                                            <th>Largo</th>
                                            <th>Ancho</th>
                                            <th>Area</th>
                                            <th>luz</th>
                                            <th>agua</th>
                                            <th>gas</th>
                                            <th>cerramiento</th>
                                            <th>camerinos</th>
                                            <th>nbaños</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody class="list">
                                            @forelse ($escenarios as $escenario)

                                            <tr>
                                                <td>{{ $escenario->tipoescenariodeportivo}}</td>
                                                <th>{{ $escenario->largo }}</th>
                                                <th>{{ $escenario->ancho }}</th>
                                                <th>{{ $escenario->area }}</th>
                                                <th>{{ $escenario->luz }}</th>
                                                <th>{{ $escenario->agua }}</th>
                                                <th>{{ $escenario->gas }}</th>
                                                <th>{{ $escenario->cerramiento }}</th>
                                                <th>{{ $escenario->camerinos }}</th>
                                                <th>{{ $escenario->nbaños }}</th>
                                                <th>{{ $escenario->descripcion }}</th>
                                                <th>{{ $escenario->estado }}</th>

                                                <td class="td-actions text-right">
                                                    <a href="{{ route('escenario.edit', $escenario->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('escenario.destroy', $escenario->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @empty

                                            <tr>
                                                <td colspan="2">Sin registros.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/fonts/Roboto.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#escenarioTable').DataTable({
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