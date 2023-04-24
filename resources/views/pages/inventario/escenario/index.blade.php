<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Escenario Deportivo</h3>
    @if ($bandera == 'activo')
    <a type="button" class="btn btn-primary" href="{{ route('escenario.create', $data->id) }}">Añadir</a>
    @endif
</div>

<div class="table-responsive m-2">
    <table class="align-items-center table-flush" id="escenarioTable">
        <thead class="bg-purple text-white">
            <th>TIPO</th>
            <th>LARGO</th>
            <th>ANCHO</th>
            <th>ÁREA</th>
            <th>LUZ</th>
            <th>AGUA</th>
            <th>GAS</th>
            <th>CERRAMIENTO</th>
            <th>CAMERINOS</th>
            <th>NBAÑOS</th>
            <th>DESCRIPCIÓN</th>
            <th>ESTADO</th>
            @if ($bandera == 'activo')
            <th>ACCIONES</th>
            @endif
        </thead>
        <tbody class="list">
            @forelse ($escenarios as $escenario)

            <tr>
                <td>{{ $escenario->tipoescenariodeportivo}}</td>
                <th>{{ $escenario->largo }}</th>
                <th>{{ $escenario->ancho }}</th>
                <th>{{ $escenario->area }}</th>
                <th>{{ $escenario->luz }}</th>
                <th>{{ $escenario->agua }}</th>
                <th>{{ $escenario->gas }}</th>
                <th>{{ $escenario->cerramiento }}</th>
                <th>{{ $escenario->camerinos }}</th>
                <th>{{ $escenario->nbaños }}</th>
                <th>{{ $escenario->descripcion }}</th>
                <th>{{ $escenario->estado }}</th>

                @if ($bandera == 'activo')
                <td class="text-right">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('escenario.edit', $escenario->id) }}">Editar</a>

                            <form action="{{ route('escenario.destroy', $escenario->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Eliminar</button>
                            </form>

                            <a class="dropdown-item" href="{{ route('diagnostico', ['parque' => $parque->id, 'id' => $escenario->id, 'tabla' => 'escenario'] ) }}">Diagnostico</a>
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