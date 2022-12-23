<div class="card-header card-header-primary">
    <h4 class="card-title">Juegos Infantiles</h4>
    <p class="card-category">Juegos registrados</p>
    <div class="col-12 text-right">

        <a type="button" class="btn btn-primary" href="{{ url('/juegos/create') }}">Añadir Juego</a>

    </div>
</div>
<div class="card-body">
    <div class="row">

    </div>
    <div class="table-responsive m-2">
        <table class="table" id="juegoTable">
            <thead class="thead-light">
                <th>Tipo</th>
                <th>Iluminacion</th>
                <th>Material</th>
                <th>Altura</th>
                <th>Cerramiento</th>
                <th>Reservable</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Area</th>
                <th>Superficie</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th class="text-right">Acciones</th>
            </thead>
            <tbody class="list">
                @forelse ($juegos as $juego)

                <tr>
                    <td>{{ $juego->tipojuego }}</td>
                    <th>{{ $juego->iluminacion }}</th>
                    <th>{{ $juego->material }}</th>
                    <th>{{ $juego->altura }}</th>
                    <th>{{ $juego->cerramiento }}</th>
                    <th>{{ $juego->reservable }}</th>
                    <th>{{ $juego->largo }}</th>
                    <th>{{ $juego->ancho }}</th>
                    <th>{{ $juego->area }}</th>
                    <th>{{ $juego->materialsuperficie }}</th>
                    <th>{{ $juego->descripcion }}</th>
                    <th>{{ $juego->estado }}</th>

                    <td class="td-actions text-right">
                        <a href="{{ route('juegos.edit', $juego->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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
        $('#juegoTable').DataTable({
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

