<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Juego Infantil</h3>
    <a type="button" class="btn btn-primary" href="{{ route('juegos.create', $data->id) }}">Añadir</a>
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

                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('juegos.edit', $juego->id) }}">Editar</a>

                            <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['id' => $juego->id, 'tabla' => 'juego']) }}">Diagnostico</a>
                        </div>
                    </div>
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