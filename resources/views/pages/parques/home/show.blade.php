@extends('layouts.app')

@section('content')

<style>
    .container-fluid {
        max-width: 80%;
        margin: 0 auto;
    }

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

    .narrow-card {
        max-width: 70%;
        font-size: 1.1em;
        /* aumenta el tamaño de letra en un 20% */
        margin: 0 auto;
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
                    @if($parque->foto)
                    <img src="{{ asset('images/parques').'/'.$parque->foto }}" alt="Foto de Parque" class="img-fluid rounded-left">
                    @else
                    <img src="{{ asset('argon/img/brand/default-parque.avif') }}" alt="Foto de Parque" class="img-fluid rounded-left">
                    @endif
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
            
            @if (Auth::check())    
            <!-- Sección de calificaciones -->
            <div class="justify-content-center mt-7">
                <div class="narrow-card card p-3 mt-3 border">
                    <h4 class="text-center mb-3">Calificar parque</h4>
                    <p class="text-center text-black mb-4">¡Tu opinión nos importa! Ayúdanos a mejorar la calidad de nuestros parques con tu calificación.</p>
                    @if($registro)
                    <form method="POST" action="{{ route('rating.update', [$registro->id, $parque->id]) }}">
                        @csrf
                        @method('PUT')
                    @else
                    <form method="POST" action="{{ route('rating.store', $parque->id) }}">
                        @csrf
                    @endif
                        <div class="form-group">
                            <label for="calificacion" class="mb-2">Calificación:</label>
                            <div class="d-flex align-items-center">
                                <select name="rating" id="rating" class="form-control mr-2">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <i class="fas fa-star fa-lg text-warning"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comentario" class="mb-2">Comentario:</label>
                            <textarea name="comentario" id="comentario" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection