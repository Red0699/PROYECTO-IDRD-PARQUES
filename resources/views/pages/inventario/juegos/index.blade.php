
<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Juego Infantil</h3>
    <a type="button" class="btn btn-primary" href="{{ route('juegos.create', $parque->id) }}">Añadir</a>
</div>

<!-- Tabla -->
<div class="table-responsive m-2">
    <table class="table align-items-center table-flush" id="invTable">
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
            <th>Acciones</th>
        </thead>
        <tbody class="list">
            @forelse ($juegos as $juego)

            <tr>
                <td>{{ $juego->tipojuego }}</td>
                <td>{{ $juego->iluminacion }}</td>
                <td>{{ $juego->material }}</td>
                <td>{{ $juego->altura }}</td>
                <td>{{ $juego->cerramiento }}</td>
                <td>{{ $juego->reservable }}</td>
                <td>{{ $juego->largo }}</td>
                <td>{{ $juego->ancho }}</td>
                <td>{{ $juego->area }}</td>
                <td>{{ $juego->materialsuperficie }}</td>
                <td>{{ $juego->descripcion }}</td>
                <td>{{ $juego->estado }}</td>

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

