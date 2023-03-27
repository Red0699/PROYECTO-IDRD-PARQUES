@extends('layouts.app')

@section('content')

<style>
    .table {
        table-layout: auto;
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .table td,
    th {
        padding: 5px;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">Informe de Históricos del Parque</h2>

    <div class="card">
        <div class="card-header">
            <form action="{{ route('historico.index', $parque->id) }}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Seleccionar Año:</h5>
                        <select class="form-control" id="año" name="año">
                            <option value="" selected>Selecciona una opción</option>
                            <option value="2023" {{ $año == '2023' ? 'selected' : ''}} >2023</option>
                            <option value="2022" {{ $año == '2022' ? 'selected' : '' }}>2022</option>
                            <option value="2021" {{ $año == '2021' ? 'selected' : '' }}>2021</option>
                            <option value="2020" {{ $año == '2020' ? 'selected' : '' }}>2020</option>
                            <option value="2019" {{ $año == '2019' ? 'selected' : '' }}>2019</option>
                        </select>
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <h5>Seleccionar tipo de recurso:</h5>
                        <select class="form-control" id="tipo" name="tipo">
                            <option selected>Todos</option>
                            <option {{ $tipo == 'Juegos Infantiles' ? 'selected' : '' }}>Juegos Infantiles</option>
                            <option {{ $tipo == 'Canchas Deportivas' ? 'selected' : '' }}>Canchas Deportivas</option>
                            <option {{ $tipo == 'Equipamientos' ? 'selected' : '' }}>Equipamientos</option>
                            <option {{ $tipo == 'Mobiliarios Urbanos' ? 'selected' : '' }}>Mobiliarios Urbanos</option>
                            <option {{ $tipo == 'Escenarios Deportivos' ? 'selected' : '' }}>Escenarios Deportivos</option>
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
            <!--------------------------------------------- Tablas de Juegos Infantiles ------------------------------------------->
            @if($tipo == 'Todos' or $tipo == 'Juegos Infantiles')
            <h2>Historico de Juegos Infantiles</h2>
            <div class="table-responsive m-2">
                <table class="table table-bordered mb-5 table-sm text-sm">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Juego</th>
                            <th>Codigo Parque</th>
                            <th>Codigo Usuario</th>
                            <th>Accion</th>
                            <th>Nombre Usuario</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th>Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeJuegos as $informe)
                        <tr>
                            <td>{{ $informe->id_record }}</td>
                            <td>{{ $informe->id_inventario }}</td>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->name }}</td>
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
            @endif
            <!--------------------------------------------- Tablas de Canchas Deportivas ------------------------------------------->
            @if($tipo == 'Todos' or $tipo == 'Canchas Deportivas')
            <h2>Historico de Canchas Deportivas</h2>
            <div class="table-responsive m-2">
                <table class="table table-bordered mb-5">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Cancha</th>
                            <th>Codigo Parque</th>
                            <th>Codigo Usuario</th>
                            <th>Accion</th>
                            <th>Nombre Usuario</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th>Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeCanchas as $informe)
                        <tr>
                            <td class="small">{{ $informe->id_record }}</td>
                            <td>{{ $informe->id_inventario }}</td>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->name }}</td>
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
            @endif
            <!--------------------------------------------- Tablas de Equipamientos ----------------------------------------------->
            @if($tipo == 'Todos' or $tipo == 'Equipamientos')
            <h2>Historico de Equipamientos</h2>
            <div class="table-responsive m-2">
                <table class="table table-bordered mb-5">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Equipamiento</th>
                            <th>Codigo Parque</th>
                            <th>Codigo Usuario</th>
                            <th>Accion</th>
                            <th>Nombre Usuario</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th>Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeEquipamientos as $informe)
                        <tr>
                            <td>{{ $informe->id_record }}</td>
                            <td>{{ $informe->id_inventario }}</td>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->name }}</td>
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
            @endif
            <!--------------------------------------------- Tablas de Mobiliarios Urbanos ------------------------------------------->
            @if($tipo == 'Todos' or $tipo == 'Mobiliarios Urbanos')
            <h2>Historico de Mobiliarios Urbanos</h2>
            <div class="table-responsive m-2">
                <table class="table table-bordered mb-5">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Mobiliarios</th>
                            <th>Codigo Parque</th>
                            <th>Codigo Usuario</th>
                            <th>Accion</th>
                            <th>Nombre Usuario</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th>Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeMobiliarios as $informe)
                        <tr>
                            <td>{{ $informe->id_record }}</td>
                            <td>{{ $informe->id_inventario }}</td>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->name }}</td>
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
            @endif
            <!--------------------------------------------- Tablas de Escenarios Deportivos ------------------------------------------->
            @if($tipo == 'Todos' or $tipo == 'Escenarios Deportivos')
            <h2>Historico de Escenarios Deportivos</h2>
            <div class="table-responsive m-2">
                <table class="table table-bordered mb-5">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Escenario</th>
                            <th>Codigo Parque</th>
                            <th>Codigo Usuario</th>
                            <th>Accion</th>
                            <th>Nombre Usuario</th>
                            <th>Datos actualizados</th>
                            <th>Resultado</th>
                            <th>Descripción</th>
                            <th>Creación</th>
                            <th>Ultima actualización</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @forelse ($informeEscenarios as $informe)
                        <tr>
                            <td>{{ $informe->id_record }}</td>
                            <td>{{ $informe->id_inventario }}</td>
                            <td>{{ $informe->id_usuario }}</td>
                            <td>{{ $informe->accion }}</td>
                            <td>{{ $informe->name }}</td>
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
            @endif
        </div>
    </div>
</div>

@endsection