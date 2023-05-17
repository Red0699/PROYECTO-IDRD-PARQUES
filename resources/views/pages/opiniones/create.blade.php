@extends('layouts.app')

@section('content')
<div class="container-fluid bg-purple py-7 text-white">
    <div class="row">
        <div class="col-md-12 text-center mt--5">
            <h1 class="text-white">Opiniones y sugerencias</h1>
            <p>¡Queremos saber tu opinión! Por favor déjanos tus sugerencias y comentarios para mejorar nuestro servicio.</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('opiniones.store') }}">
                        @csrf

                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="form-group mr-2">
                            <label for="nombre" class="col-form-label">Nombre Completo</label>
                            <input id="nombre" type="text" class="form-control form-control-lg @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mr-2">
                            <label for="correo" class="col-form-label">Correo Electrónico</label>
                            <input id="correo" type="email" class="form-control form-control-lg @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="correo">
                            @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mensaje" class="col-form-label">Mensaje</label>
                            <textarea id="mensaje" class="form-control form-control-lg @error('mensaje') is-invalid @enderror" name="mensaje" required>{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.guest')
@endsection