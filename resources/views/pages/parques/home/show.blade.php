@extends('layouts.app')

@section('content')

<style>
    .card {
        margin: 10px;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 40px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .card-text {
        font-size: 15px;
        margin-bottom: 10px;
    }

    .rounded-left {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }
</style>

<div class="header bg-purple pb-7 pt-5 pt-lg-8 d-flex">
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <h1 class="text-white ">Detalles del parque</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid mt--7">
        <div class="card">
            <!-- Contenedor Recursos del parque -->
            <div class="row align-items-stretch">
                <div class="col-md-7">
                    <h5 class="text-center">Foto del parque</h5>
                    <img src="{{ asset('images/parques').'/'.$parque->foto }}" alt="Foto de Parque" class="img-fluid rounded-left" height="700" width="700">
                </div>
                <div class="col-md-5">
                    <h5 class="text-center">Información del parque</h5>
                    <div class="card-body">
                        <h1 class="card-title text-center">Parque {{ $parque->nombreParque }}</h1>
                        <p class="card-text"><strong>Dirección:</strong> {{ $parque->direccion }}</p>
                        <p class="card-text"><strong>Localidad:</strong> {{ $parque->localidad }}</p>
                        <p class="card-text"><strong>Estrato:</strong> {{ $parque->estrato }}</p>
                        <p class="card-text"><strong>Escala:</strong> {{ $parque->escala }}</p>
                        <p class="card-text"><strong>Area:</strong> {{ $parque->area }}m<sup>2</sup></p>
                        <p class="card-text"><strong>Descripción:</strong></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection