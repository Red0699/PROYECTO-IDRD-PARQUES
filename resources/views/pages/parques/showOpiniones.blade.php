@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Opiniones y Sugerencias</h1>
    <div class="py-4">
        <form action="{{ route('vistaOpinion.show') }}" method="GET">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label for="fecha">Filtrar por fecha:</label>
                    <select class="form-control" id="fecha" name="fecha" class="form-select">
                        <option value="">Todos</option>
                        <option value="hoy">Hoy</option>
                        <option value="semana">Última semana</option>
                        <option value="mes">Último mes</option>
                    </select>
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>

            </div>
        </form>
    </div>

    <table id="opinionTable" class="table table-striped">
        <thead class="bg-purple text-white">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Mensaje</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($opiniones as $opinion)
            <tr>
                <td>{{ $opinion->nombre }}</td>
                <td>{{ $opinion->correo }}</td>
                <td>{{ $opinion->mensaje }}</td>
                <td>{{ $opinion->created_at }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
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

<script>
    $(document).ready(function() {
        $('#opinionTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> ',
                    titleAttr: 'Exportar a PDF',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    className: 'btn-danger',
                    download: 'open',
                    messageTop: 'Reporte general parques',
                    title: 'Institución Distrital de Recreación y Deporte',
                    //Customizar estilos tabla PDF
                    customize: function(doc) {

                        doc.styles.title = {
                            color: '#7F4DA9',
                            fontSize: '30',
                            alignment: 'center'
                        }
                        doc.styles['td:nth-child(2)'] = {
                            width: '100px',
                            'max-width': '100px'
                        }
                        doc.styles.tableHeader = {
                            fillColor: '#7F4DA9',
                            color: 'white'
                        }
                        doc.defaultStyle.alignment = 'center';

                    }
                }
            ],
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