<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Cancha Deportiva</h3>
    <a type="button" class="btn btn-primary" href="{{ route('cancha.create', $data->id) }}">Añadir</a>
</div>

<!-- Tabla -->
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
            <th>Acciones</th>
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


                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('cancha.edit', $cancha->id) }}">Editar</a>

                            <form action="{{ route('cancha.destroy', $cancha->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['parque' => $parque->id, 'id' => $cancha->id, 'tabla' => 'cancha'] ) }}">Diagnostico</a>
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