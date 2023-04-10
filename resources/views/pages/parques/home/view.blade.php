@extends('layouts.app')

@section('content')

<style>
    /* Estilos generales */
    body {
        font-family: "Open Sans", sans-serif;
        font-size: 14px;
        line-height: 1.5;
        color: #333333;
    }

    /* Estilos de la tabla */
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        border-collapse: collapse;
        font-size: 0.9rem;
        border: 1px solid #dee2e6;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

</style>

<div>
    <div class="header bg-purple pb-8 pt-5 pt-lg-8 d-flex">
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <h1 class="text-white">Datos del Parque</h1>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">Tabla de Datos</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Ubicación</th>
                                    <th scope="col">Área (m²)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Parque Nacional Natural Tayrona</td>
                                    <td>Santa Marta, Colombia</td>
                                    <td>58.300</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Parque Nacional Natural Los Nevados</td>
                                    <td>Caldas, Colombia</td>
                                    <td>58.300</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Parque Natural Regional El Faro</td>
                                    <td>Bogotá, Colombia</td>
                                    <td>16.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection