<!-- Header -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h3 class="text-left">Agregar Mobiliario Urbano</h3>
    <a type="button" class="btn btn-primary" href="{{ route('mobiliario.create', $parque->id) }}">Añadir</a>
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

                <td class="td-actions text-right">
                    <a href="{{ route('mobiliario.edit', $mobiliario->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('mobiliario.destroy', $mobiliario->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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