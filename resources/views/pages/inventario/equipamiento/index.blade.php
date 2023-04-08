<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Equipamiento</h3>
    <a type="button" class="btn btn-primary" href="{{ route('equipamiento.create', $data->id) }}">Añadir</a>
</div>

<!-- Tabla -->
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

                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('equipamiento.edit', $equipamiento->id) }}">Editar</a>

                            <form action="{{ route('equipamiento.destroy', $equipamiento->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['idParque' => $parque->id, 'id' => $equipamiento->id, 'tabla' => 'juego'] ) }}">Diagnostico</a>                        </div>
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