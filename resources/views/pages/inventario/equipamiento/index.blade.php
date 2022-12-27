<div class="card-header card-header-primary">
    <h4 class="card-title">equipamiento</h4>
    <p class="card-category">equipamiento registrados</p>
    <div class="col-12 text-right">

        <a type="button" class="btn btn-primary" href="{{ route('equipamiento.create', $parque->id) }}">Añadir equipamiento</a>

    </div>
</div>
<div class="card-body">
    <div class="row">

    </div>
    <div class="table-responsive m-2">
        <table class="table" id="equipamientoTable">
            <thead class="thead-light">
                <th>modulo</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Area</th>
                <th>agua</th>
                <th>gas</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th class="text-right">Acciones</th>
            </thead>
            <tbody class="list">
                @forelse ($equipamientos as $equipamiento)

                <tr>
                    <td>{{ $equipamiento->modulo}}</td>
                    <th>{{ $equipamiento->largo }}</th>
                    <th>{{ $equipamiento->ancho}}</th>
                    <th>{{ $equipamiento->area }}</th>
                    <th>{{ $equipamiento->agua }}</th>
                    <th>{{ $equipamiento->gas }}</th>
                    <th>{{ $equipamiento->descripcion }}</th>
                    <th>{{ $equipamiento->estado }}</th>

                    <td class="td-actions text-right">
                        <a href="{{ route('equipamiento.edit', $equipamiento->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('equipamiento.destroy', $equipamiento->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
        $('#equipamientoTable').DataTable({
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