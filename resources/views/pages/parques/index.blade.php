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
                                <h2 class="card-title">Módulo de parques</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="mt-3 mb-0">Bienvenido al módulo de gestión de parques. Aquí puedes realizar un CRUD (Crear, Leer, Actualizar y Eliminar) de los parques registrados en el sistema. ¡Agrega, edita y elimina parques según sea necesario!</p>
                                    </div>
                                </div>
                                <div class="row py-4 justify-content-left">

                                    <a type="button" class="btn btn-primary float-right mx-2" href="{{ url('/parque/create') }}">Añadir Parque</a>

                                    <a type="button" class="btn btn-primary float-right mx-2" href="{{ url('/informeParques') }}"><i class="fa fa-bar-chart"></i> Ver Informe</a>

                                    <a type="button" class="btn btn-primary float-right mx-2" href="{{ url('/opiniones') }}"><i class="fa fa-bar-chart"></i>Ver opiniones y sugerencias</a>

                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">

                                </div>
                                <div class="table-responsive m-2">
                                    <table class="table" id="parqueTable">
                                        <thead class="thead-light">
                                            <th>Nombre</th>
                                            <th>Foto</th>
                                            <th>Localidad</th>
                                            <th>Dirección</th>
                                            <th>Escala</th>

                                            <th>Acciones</th>
                                        </thead>
                                        <tbody class="list">
                                            @forelse ($parques as $parque)

                                            <tr>
                                                <td>{{ $parque->nombreParque }}</td>
                                                @if($parque->foto == null)

                                                <td>
                                                    <span class="badge badge-danger">Sin Foto</span>
                                                </td>
                                                @else
                                                <td>
                                                    <img src=" {{ asset('images/parques').'/'.$parque->foto }} " alt="" width="100">
                                                </td>
                                                @endif
                                                <th>{{ $parque->localidad }}</th>
                                                <th>{{ $parque->direccion }}</th>
                                                <th>{{ $parque->escala }}</th>

                                                <td class="td-actions text-right">
                                                    <a href="{{ route('parque.show', $parque->id) }}" class="btn bg-purple text-white btn-sm"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('parque.edit', $parque->id) }}" class="btn bg-yellow btn-sm text-white"><i class="fas fa-edit"></i></a>
                                                    <form id="delete-form" action="{{ route('parque.destroy', $parque->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="button" rel="tooltip" onclick="confirmDelete()">
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
        $('#parqueTable').DataTable({
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

<script>
    function confirmDelete() {
        swal({
            title: "Confirmar eliminación",
            text: "¿Estás seguro de que deseas eliminar este parque?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirmed) {
            if (isConfirmed) {
                document.getElementById('delete-form').submit();

            } else {
                swal("Cancelado", "La acción ha sido cancelada.", "error");
            }
        });
    }
</script>
@endpush



@endsection