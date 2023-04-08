<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Mobiliario Urbano</h3>
    <a type="button" class="btn btn-primary" href="{{ route('mobiliario.create', $data->id) }}">Añadir</a>
</div>

<!-- Tabla -->
<div class="table-responsive m-2">
    <table class="table" id="mobiliarioTable">
        <thead class="thead-light">
            <th>tipomobiliario</th>
            <th>material</th>
            <th>longitud</th>
            <th>ubicacion</th>
            <th>Estado</th>
            <th class="text-right">Acciones</th>
        </thead>
        <tbody class="list">
            @forelse ($mobiliarios as $mobiliario)

            <tr>
                <td>{{ $mobiliario->tipomobiliario}}</td>
                <th>{{ $mobiliario->material }}</th>
                <th>{{ $mobiliario->longitud}}</th>
                <th>{{ $mobiliario->ubicacion }}</th>
                <th>{{ $mobiliario->estado}}</th>

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

                            <a class="dropdown-item" href="{{ route('diagnostico', ['idParque' => $parque->id, 'id' => $mobiliario->id, 'tabla' => 'juego'] ) }}">Diagnostico</a>                        </div>
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