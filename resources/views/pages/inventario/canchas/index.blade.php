<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Cancha Deportiva</h3>
    @if ($bandera == 'activo')
    <a type="button" class="btn btn-primary" href="{{ route('cancha.create', $data->id) }}">Añadir</a>
    @endif
</div>

<!-- Tabla -->
<div class="table table-responsive m-2">
    <table class="align-items-center table-flush" id="canchaTable">
        <thead class="thead bg-purple text-white">
            <th>TIPO</th>
            <th>ILUMINACIÓN</th>
            <th>MATERIAL</th>
            <th>CERRAMIENTO</th>
            <th>CAMERINO</th>
            <th>LARGO</th>
            <th>ANCHO</th>
            <th>ÁREA</th>
            <th>DESCRIPCIÓN</th>
            <th>ESTADO</th>
            @if ($bandera == 'activo')
            <th>ACCIONES</th>
            @endif
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

                @if ($bandera == 'activo')
                <td>
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('cancha.edit', $cancha->id) }}">Editar</a>

                            <form action="{{ route('cancha.destroy', $cancha->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Está seguro que desea realizar esta acción?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['parque' => $parque->id, 'id' => $cancha->id, 'tabla' => 'cancha'] ) }}">Diagnostico</a>
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