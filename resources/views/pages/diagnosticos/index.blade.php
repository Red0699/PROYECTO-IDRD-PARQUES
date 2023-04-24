@extends('layouts.app')

@section('content')

@push('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<style>
    /* Estilos para la tabla */
    #tabla-diagnosticos {
        font-size: 14px;
    }

    #tabla-diagnosticos_wrapper {
        padding: 10px;
    }

    #tabla-diagnosticos_filter {
        display: inline-block;
        margin-bottom: 10px;
    }

    #tabla-diagnosticos_length {
        display: inline-block;
    }

    #tabla-diagnosticos_info {
        margin-bottom: 10px;
    }

    #tabla-diagnosticos_paginate {
        margin-top: 10px;
    }

    #tabla-diagnosticos_paginate .paginate_button {
        padding: 5px 10px;
        margin-left: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    #tabla-diagnosticos_paginate .paginate_button.current {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    #tabla-diagnosticos_paginate .paginate_button.disabled {
        opacity: 0.5;
        cursor: default;
    }

    #tabla-diagnosticos_paginate .paginate_button:hover:not(.disabled) {
        background-color: #eee;
    }
</style>

@endpush

<div class="container py-5">
    <div class="card">
        <div class="card-body">
            <h1>Diagnósticos de Parques</h1>

            <div class="row">
                <div class="col-md-2">
                    <a type="button" href="{{ route('general.informe') }}" class="btn bg-purple text-white btn-block">Ver informe de diagnóstico</a>
                </div>
            </div>
            <hr>

            <form method="GET" action="{{ route('diagnostico.index') }}">
                <div class="form-group row">

                    <div class="col-md-3">
                        <h5>Seleccionar Parque:</h5>
                        <select id="parque_id" name="parque_id" class="form-control" required>
                            <option value="" disabled selected>Seleccionar Parque</option>
                            @foreach($parques as $parque)
                            <option value="{{ $parque->id }}" {{ $parque_id == $parque->id ? 'selected' : '' }}>
                                {{ $parque->nombreParque }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <h5>Seleccionar tipo de recurso:</h5>
                        <select id="tipo_recurso" name="tipo_recurso" class="form-control">
                            <option value="" selected>Todos</option>
                            <option value="juego" {{ $tipo_recurso == 'juego' ? 'selected' : '' }}>Juego Infantil</option>
                            <option value="escenario" {{ $tipo_recurso == 'escenario' ? 'selected' : '' }}>Escenario Deportivo</option>
                            <option value="cancha" {{ $tipo_recurso == 'cancha' ? 'selected' : '' }}>Cancha Deportiva</option>
                            <option value="equipamiento" {{ $tipo_recurso == 'equipamiento' ? 'selected' : '' }}>Equipamiento</option>
                            <option value="mobiliario" {{ $tipo_recurso == 'mobiliario' ? 'selected' : '' }}>Mobiliario Urbano</option>

                        </select>
                    </div>
                    <div class="col-md-4">
                        <h5>Seleccionar Estado:</h5>
                        <select name="estado" id="estado" class="form-control">
                            <option value="" selected>Todos</option>
                            <option value="Bueno" {{ $estado == 'Bueno' ? 'selected' : '' }}>Bueno con diagnostico</option>
                            <option value="En mal estado" {{ $estado == 'En mal estado' ? 'selected' : '' }}>En mal estado</option>
                            <option value="En proceso de mantenimiento" {{ $estado == 'En proceso de mantenimiento' ? 'selected' : '' }}>En proceso de mantenimiento</option>
                            <option value="Pendiente de piezas" {{ $estado == 'Pendiente de piezas' ? 'selected' : '' }}>Pendiente de piezas</option>
                            <option value="En prueba" {{ $estado == 'En prueba' ? 'selected' : '' }}>En prueba</option>
                        </select>
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button class="btn bg-purple text-white btn-block" type="submit">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>

            @if($diagnosticos->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabla-diagnosticos">
                    <thead class="bg-purple text-white">
                        <tr>
                            <th>Codigo Recurso</th>
                            <th>Recurso</th>
                            <th>Estado</th>
                            <th>Fecha Diagnostico</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnosticos as $diagnostico)
                        <tr>
                            <td>{{ $diagnostico->id_recurso }}</td>
                            <td>{{ $diagnostico->tipoRecurso }}</td>
                            <td>{{ $diagnostico->estado }}</td>
                            <td>{{ $diagnostico->fecha }}</td>
                            <td>{{ $diagnostico->descripcion }}</td>
                            <td>{{ $diagnostico->acciones }}</td>
                            <td>
                                <a href="{{ route('diagnostico.edit', $diagnostico->id) }}" class="btn btn-sm bg-purple text-white">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No se encontraron diagnósticos para el parque seleccionado.</p>
                @endif
            </div>

        </div>
    </div>

</div>

@endsection

@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"></script>

<script>
    $(document).ready(function() {
        $('#tabla-diagnosticos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            }
        });
    });
</script>


@endpush