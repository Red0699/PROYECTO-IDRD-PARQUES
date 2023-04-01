@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Informe de Históricos del Usuario {{ $user->name }}</h2>

    <div class="card">
        <div class="card-header">
            <form action="{{ route('historico.usuario', $user->id) }}" method="GET">
                <div class="row">
                    <div class="col">
                        <h5>Seleccionar Año:</h5>
                        <select class="form-control" id="año" name="año">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="2023" {{ $año == '2023' ? 'selected' : ''}}>2023</option>
                            <option value="2022" {{ $año == '2022' ? 'selected' : '' }}>2022</option>
                            <option value="2021" {{ $año == '2021' ? 'selected' : '' }}>2021</option>
                            <option value="2020" {{ $año == '2020' ? 'selected' : '' }}>2020</option>
                            <option value="2019" {{ $año == '2019' ? 'selected' : '' }}>2019</option>
                        </select>
                    </div>
                    <div class="col">
                        <h5>Seleccionar Mes:</h5>
                        <select class="form-control" id="mes" name="mes">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="01" {{ $mes == '01' ? 'selected' : '' }}>Enero</option>
                            <option value="02" {{ $mes == '02' ? 'selected' : '' }}>Febrero</option>
                            <option value="03" {{ $mes == '03' ? 'selected' : '' }}>Marzo</option>
                            <option value="04" {{ $mes == '04' ? 'selected' : '' }}>Abril</option>
                            <option value="05" {{ $mes == '05' ? 'selected' : '' }}>Mayo</option>
                            <option value="06" {{ $mes == '06' ? 'selected' : '' }}>Junio</option>
                            <option value="07" {{ $mes == '07' ? 'selected' : '' }}>Julio</option>
                            <option value="08" {{ $mes == '08' ? 'selected' : '' }}>Agosto</option>
                            <option value="09" {{ $mes == '09' ? 'selected' : '' }}>Septiembre</option>
                            <option value="10" {{ $mes == '10' ? 'selected' : '' }}>Octubre</option>
                            <option value="11" {{ $mes == '11' ? 'selected' : '' }}>Noviembre</option>
                            <option value="12" {{ $mes == '12' ? 'selected' : '' }}>Diciembre</option>
                        </select>
                    </div>

                    <div class="col-md-3 align-self-end">
                        <button class="btn btn-primary btn-block" type="submit">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <!--------------------------------------------- Tablas de Historicos ------------------------------------------->

            <div class="table-responsive m-2">
                <table class="table table-bordered mb-5" style="border-spacing: 8px;">
                    <thead class="bg-purple text-white encabezado">
                        <tr>
                            <th>Codigo Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Codigo Modulo</th>
                            <th>Modulo modificado</th>
                            <th>Codigo Inventario</th>
                            <th>Accion</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th class="col-md-2">Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeUsuario as $informe)
                        <tr>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->name }}</td>
                            <td>{{ $informe->id_record }}</td>
                            <td>{{ $informe->tabla }}</td>
                            @if(isset($informeUsuario->id_inventario))
                            <td>{{ $informe->id_inventario }}</td>
                            @else
                            <td>NULL</td>
                            @endif
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->campos }}</td>
                            <td>{{ $informe->resultado }}</td>
                            <td>{{ $informe->descripcion }}</td>
                            <td>{{ $informe->created_at }}</td>
                            <td>{{ $informe->updated_at }}</td>
                        </tr>
                        @empty

                        <tr>
                            <td colspan="2">Sin registros.</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection