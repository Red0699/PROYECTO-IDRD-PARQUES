@extends('layouts.app')

@section('content')

<style>
    .container {
        width: 80%;
        height: 80%;
    }

    .card-header {
        color: white;
        font-size: 24px;
        font-weight: bold;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card-body img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
    }

    .card-body h2 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .card-body p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    
</style>

<div class="container py-5">
    <div class="card">
        <div class="card-header bg-purple text-center">
            Perfil de usuario
        </div>
        <div class="card-body">
            <img src="{{ auth()->user()->photo ?? '../assets/img/theme/default-user-image.png' }}" alt="Foto de perfil">
            <h2>{{ $user->name }}</h2>
            <p><strong>Correo electrónico:</strong> {{ $user->email }}</p>
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Fecha de creación:</strong> {{ $user->created_at }}</p>
            <p><strong>Fecha de actualización:</strong> {{ $user->updated_at }}</p>
            <a href="#" class="btn btn-primary">Ver historial</a>
        </div>
    </div>
</div>

@endsection