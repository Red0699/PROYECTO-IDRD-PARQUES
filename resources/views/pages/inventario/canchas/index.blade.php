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

                <td class="td-actions text-right">
                    <a href="{{ route('cancha.edit', $cancha->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('cancha.destroy', $cancha->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
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

