<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Juego Infantil</h3>
    @if($bandera == 'activo')
    <a type="button" class="btn btn-primary" href="{{ route('juegos.create', $data->id) }}">Añadir</a>
    @endif
</div>

<!-- Tabla -->
<div class="table table-responsive m-2">
    <table class="align-items-center table-flush" id="invTable">
        <thead class="thead bg-purple text-white">
            <th>TIPO</th>
            <th>ILUMINACIÓN</th>
            <th>MATERIAL</th>
            <th>ALTURA</th>
            <th>CERRAMIENTO</th>
            <th>RESERVABLE</th>
            <th>LARGO</th>
            <th>ANCHO</th>
            <th>ÁREA</th>
            <th>SUPERFICIE</th>
            <th>DESCRIPCIÓN</th>
            <th>ESTADO</th>
            @if ($bandera == 'activo')
            <th>ACCIONES</th>
            @endif
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

                @if ($bandera == 'activo')
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('juegos.edit', $juego->id) }}">Editar</a>

                            <form action="{{ route('juegos.destroy', $juego->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Está seguro que desea realizar esta acción?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['parque' => $parque->id, 'id' => $juego->id, 'tabla' => 'juego'] ) }}">Diagnostico</a>
                        </div>
                    </div>
                </td>
                @endif
            </tr>
            @empty

            <tr>
                <td colspan="2">Sin registros.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>