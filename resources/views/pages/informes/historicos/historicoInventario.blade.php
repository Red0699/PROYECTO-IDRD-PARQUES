@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Informe de Históricos del Parque</h2>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <h5>Seleccionar Año:</h5>
                    <select class="form-control">
                        <option>2023</option>
                        <option>2022</option>
                        <option>2021</option>
                        <option>2020</option>
                        <option>2019</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <h5>Seleccionar Mes:</h5>
                    <select class="form-control">
                        <option>Enero</option>
                        <option>Febrero</option>
                        <option>Marzo</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <h5>Seleccionar tipo de recurso:</h5>
                    <select class="form-control">
                        <option selected">Todos</option>
                        <option>Juegos Infantiles</option>
                        <option>Canchas Deportivas</option>
                        <option>Equipamientos</option>
                        <option>Mobiliarios Urbanos</option>
                        <option>Escenarios Deportivos</option>
                    </select>
                </div>
                <div class="col-md-3 align-self-end">
                    <button class="btn btn-primary btn-block">
                        Buscar
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!--------------------------------------------- Tablas de Juegos Infantiles ------------------------------------------->
            <h2>Historico de Juegos Infantiles</h2>
            <table class="table table-bordered mb-5">
                <thead class="bg-purple text-white">
                    <tr>
                        <th>Año</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1492</td>
                        <td>Descubrimiento de América por parte de Cristóbal Colón</td>
                    </tr>
                    <tr>
                        <td>1810</td>
                        <td>Inicio de la Guerra de Independencia de México</td>
                    </tr>
                    <tr>
                        <td>1917</td>
                        <td>Promulgación de la Constitución Política de los Estados Unidos Mexicanos</td>
                    </tr>
                </tbody>
            </table>

            <!--------------------------------------------- Tablas de Canchas Deportivas ------------------------------------------->

            <h2>Historico de Canchas Deportivas</h2>
            <table class="table table-bordered mb-5">
                <thead class="bg-purple text-white">
                    <tr>
                        <th>Año</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1492</td>
                        <td>Descubrimiento de América por parte de Cristóbal Colón</td>
                    </tr>
                    <tr>
                        <td>1810</td>
                        <td>Inicio de la Guerra de Independencia de México</td>
                    </tr>
                    <tr>
                        <td>1917</td>
                        <td>Promulgación de la Constitución Política de los Estados Unidos Mexicanos</td>
                    </tr>
                </tbody>
            </table>

            <!--------------------------------------------- Tablas de Equipamientos ----------------------------------------------->

            <h2>Historico de Equipamientos</h2>
            <table class="table table-bordered mb-5">
                <thead class="bg-purple text-white">
                    <tr>
                        <th>Año</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1492</td>
                        <td>Descubrimiento de América por parte de Cristóbal Colón</td>
                    </tr>
                    <tr>
                        <td>1810</td>
                        <td>Inicio de la Guerra de Independencia de México</td>
                    </tr>
                    <tr>
                        <td>1917</td>
                        <td>Promulgación de la Constitución Política de los Estados Unidos Mexicanos</td>
                    </tr>
                </tbody>
            </table>

            <!--------------------------------------------- Tablas de Mobiliarios Urbanos ------------------------------------------->

            <h2>Historico de Mobiliarios Urbanos</h2>
            <table class="table table-bordered mb-5">
                <thead class="bg-purple text-white">
                    <tr>
                        <th>Año</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1492</td>
                        <td>Descubrimiento de América por parte de Cristóbal Colón</td>
                    </tr>
                    <tr>
                        <td>1810</td>
                        <td>Inicio de la Guerra de Independencia de México</td>
                    </tr>
                    <tr>
                        <td>1917</td>
                        <td>Promulgación de la Constitución Política de los Estados Unidos Mexicanos</td>
                    </tr>
                </tbody>
            </table>

            <!--------------------------------------------- Tablas de Escenarios Deportivos ------------------------------------------->

            <h2>Historico de Escenarios Deportivos</h2>
            <table class="table table-bordered mb-5">
                <thead class="bg-purple text-white">
                    <tr>
                        <th>Año</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1492</td>
                        <td>Descubrimiento de América por parte de Cristóbal Colón</td>
                    </tr>
                    <tr>
                        <td>1810</td>
                        <td>Inicio de la Guerra de Independencia de México</td>
                    </tr>
                    <tr>
                        <td>1917</td>
                        <td>Promulgación de la Constitución Política de los Estados Unidos Mexicanos</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection