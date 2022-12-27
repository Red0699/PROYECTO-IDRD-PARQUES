<div class="card-header card-header-primary">
    <h4 class="card-title">canchas deportivas</h4>
    <p class="card-category">canchas registrados</p>
    <div class="col-12 text-right">

        <a type="button" class="btn btn-primary" href="{{ route('cancha.create', $parque->id) }}">Añadir cancha</a>

    </div>
</div>
<div class="card-body">
    <div class="row">

    </div>
    <div class="table-responsive m-2">
        <table class="table" id="canchaTable">
            <thead class="thead-light">
                <th>Tipo</th>
                <th>Iluminacion</th>
                <th>Material</th>
                <th>Cerramiento</th>
                <th>camerino</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Area</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th class="text-right">Acciones</th>
            </thead>
            <tbody class="list">
                @forelse ($canchas as $cancha)

                <tr>
                    <td>{{ $cancha->tipocancha}}</td>
                    <th>{{ $cancha->iluminacion }}</th>
                    <th>{{ $cancha->material }}</th>
                    <th>{{ $cancha->cerramiento }}</th>
                    <th>{{ $cancha->camerino }}</th>
                    <th>{{ $cancha->largo }}</th>
                    <th>{{ $cancha->ancho }}</th>
                    <th>{{ $cancha->area }}</th>
                    <th>{{ $cancha->descripcion }}</th>
                    <th>{{ $cancha->estado }}</th>

                    <td class="td-actions text-right">
                        <a href="{{ route('cancha.edit', $cancha->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('cancha.destroy', $cancha->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
        $('#canchaTable').DataTable({
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