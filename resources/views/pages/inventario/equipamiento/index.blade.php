<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Equipamiento</h3>
    <a type="button" class="btn btn-primary" href="{{ route('equipamiento.create', $parque->id) }}">Añadir</a>
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

                <td class="td-actions text-right">
                    <a href="{{ route('equipamiento.edit', $equipamiento->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('equipamiento.destroy', $equipamiento->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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