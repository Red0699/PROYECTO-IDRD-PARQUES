<div class="card-header card-header-primary">
    <h4 class="card-title">escenarios deportivos</h4>
    <p class="card-category">escenarios registrados</p>
    <div class="col-12 text-right">

        <a type="button" class="btn btn-primary" href="{{ route('escenario.create', $parque->id) }}">Añadir escenario deportivo</a>

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