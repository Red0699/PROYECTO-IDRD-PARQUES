@extends('layouts.app')

@section('content')

<style>
    .dataTables_filter input {
        width: 400px;
        /* o cualquier ancho deseado */
    }

    /* Estilos generales */
    body {
        font-family: "Open Sans", sans-serif;
        font-size: 14px;
        line-height: 1.5;
        color: #333333;
    }

    /* Estilos de la tabla */
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        border-collapse: collapse;
        font-size: 0.9rem;
        border: 1px solid #dee2e6;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }
</style>

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@endpush

<div>
    <div class="header bg-purple pb-7 pt-5 pt-lg-8 d-flex">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <h1 class="text-white ">Lista de parques administrados por el IDRD</h1>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <form action="{{ route('vista') }}" method="GET">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4">
                                    <h5>Localidad:</h5>
                                    <select class="form-control" aria-label="Localidad" id="localidad" name="localidad">
                                        <option value="" selected>Seleccionar localidad</option>
                                        <option value="Antonio Nariño"{{ $localidad == 'Antonio Nariño' ? 'selected' : '' }}>Antonio Nariño</option>
                                        <option value="Barrios Unidos"{{ $localidad == 'Barrios Unidos' ? 'selected' : '' }}>Barrios Unidos</option>
                                        <option value="Bosa"{{ $localidad == 'Bosa' ? 'selected' : '' }}>Bosa</option>
                                        <option value="Chapinero"{{ $localidad == 'Chapinero' ? 'selected' : '' }}>Chapinero</option>
                                        <option value="Ciudad Bolívar"{{ $localidad == 'Ciudad Bolívar' ? 'selected' : '' }}>Ciudad Bolívar</option>
                                        <option value="Engativá"{{ $localidad == 'Engativá' ? 'selected' : '' }}>Engativá</option>
                                        <option value="Fontibón"{{ $localidad == 'Fontibón' ? 'selected' : '' }}>Fontibón</option>
                                        <option value="Kennedy"{{ $localidad == 'Kennedy' ? 'selected' : '' }}>Kennedy</option>
                                        <option value="La Candelaria"{{ $localidad == 'La Candelaria' ? 'selected' : '' }}>La Candelaria</option>
                                        <option value="Los Mártires"{{ $localidad == 'Los Mártires' ? 'selected' : '' }}>Los Mártires</option>
                                        <option value="Puente Aranda"{{ $localidad == 'Puente Aranda' ? 'selected' : '' }}>Puente Aranda</option>
                                        <option value="Rafael Uribe Uribe"{{ $localidad == 'Rafael Uribe Uribe' ? 'selected' : '' }}>Rafael Uribe Uribe</option>
                                        <option value="San Cristóbal"{{ $localidad == 'San Cristóbal' ? 'selected' : '' }}>San Cristóbal</option>
                                        <option value="Santa Fe"{{ $localidad == 'Santa Fe' ? 'selected' : '' }}>Santa Fe</option>
                                        <option value="Suba"{{ $localidad == 'Suba' ? 'selected' : '' }}>Suba</option>
                                        <option value="Sumapaz"{{ $localidad == 'Sumapaz' ? 'selected' : '' }}>Sumapaz</option>
                                        <option value="Teusaquillo"{{ $localidad == 'Teusaquillo' ? 'selected' : '' }}>Teusaquillo</option>
                                        <option value="Tunjuelito"{{ $localidad == 'Tunjuelito' ? 'selected' : '' }}>Tunjuelito</option>
                                        <option value="Usaquén"{{ $localidad == 'Usaquén' ? 'selected' : '' }}>Usaquén</option>
                                        <option value="Usme"{{ $localidad == 'Usme' ? 'selected' : '' }}>Usme</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <h5>Escala:</h5>
                                    <select class="form-control" aria-label="Escala" id="escala" name="escala">
                                        <option value="" selected>Seleccionar escala</option>
                                        <option value="Parque de Bolsillo" {{ $escala == 'Parque de Bolsillo' ? 'selected' : '' }}>Parque de Bolsillo</option>
                                        <option value="Parque Metropolitano" {{ $escala == 'Parque Metropolitano' ? 'selected' : '' }}>Parque Metropolitano</option>
                                        <option value="Parque Vecinal" {{ $escala == 'Parque Vecinal' ? 'selected' : '' }}>Parque Vecinal</option>
                                        <option value="Parque Zonal" {{ $escala == 'Parque Zonal' ? 'selected' : '' }}>Parque Zonal</option>
                                        <option value="Parque Regional" {{ $escala == 'Parque Regional' ? 'selected' : '' }}>Parque Regional</option>
                                    </select>
                                </div>
                                <div class="col-md-2 align-self-end">
                                    <button class="btn bg-purple text-white btn-block" type="submit">
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="parqueTable">
                                <thead class="thead-light">

                                    <th>Nombre</th>
                                    <th>Foto</th>
                                    <th>Localidad</th>
                                    <th>Dirección</th>
                                    <th>Escala</th>
                                    <th>Area</th>
                                    <th>Calificación</th>
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
                                        <th>{{ $parque->area }}m<sup>2</sup></th>
                                        <th>{{ $parque->averageRating() }}</th>

                                        <td class="td-actions">
                                            <a href="{{ route('vista.show', $parque->id) }}" class="btn bg-purple text-white"><i class="fas fa-eye"></i></a>
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

@endsection

@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>


<script>
    $(document).ready(function() {
        $('#parqueTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
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