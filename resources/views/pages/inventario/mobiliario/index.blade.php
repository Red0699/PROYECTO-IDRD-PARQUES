<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Mobiliario Urbano</h3>
    @if ($bandera == 'activo')
    <a type="button" class="btn btn-primary" href="{{ route('mobiliario.create', $data->id) }}">Añadir</a>
    @endif
</div>

<!-- Tabla -->
<div class="table-responsive m-2">
    <table class="table" id="mobiliarioTable">
        <thead class="thead bg-purple text-white">
            <th>tipo</th>
            <th>material</th>
            <th>longitud</th>
            <th>ubicación</th>
            <th>Estado</th>
            @if ($bandera == 'activo')
            <th>Acciones</th>
            @endif
        </thead>
        <tbody class="list">
            @forelse ($mobiliarios as $mobiliario)

            <tr>
                <td>{{ $mobiliario->tipomobiliario}}</td>
                <th>{{ $mobiliario->material }}</th>
                <th>{{ $mobiliario->longitud}}</th>
                <th>{{ $mobiliario->ubicacion }}</th>
                <th>{{ $mobiliario->estado}}</th>

                @if ($bandera == 'activo')
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('mobiliario.edit', $mobiliario->id) }}">Editar</a>

                            <form action="{{ route('mobiliario.destroy', $mobiliario->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['parque' => $parque->id, 'id' => $mobiliario->id, 'tabla' => 'mobiliario'] ) }}">Diagnostico</a>
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