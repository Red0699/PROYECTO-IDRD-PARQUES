@extends('layouts.app')

@section('content')

<style>
    .container {
        width: 80%;
        height: 80%;
        
    }

    .fotoPerfil .avatar {
        width: 140px;
        height: 160px;
    }
</style>

<div class="container card py-5">
    <!-------------------- Header ----------------------->
    <div class="header bg-purple pb-7 pt-5 pt-lg-7 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-4"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <h1 class="display-2 text-white">Perfil de usuario</h1>
                </div>
            </div>
        </div>

    </div>
    <!-------------------------------------------------------- Contenido --------------------------------------------------------->

    <!---------------- Foto ---------------->
    <div class="fotoPerfil">
        <div class="row justify-content-center">
            <div class="order-lg-2">
                <div class="card-profile-image">
                    <a href="#">
                        @if(auth()->user()->photo == null)
                        <img src="../assets/img/theme/default-user-image.png" class="avatar">
                        @else
                        <img src="{{ auth()->user()->photo }}" class="img-fluid rounded-circle avatar-lg">
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!------------- Información ------------->
    <div class="informacion py-8 justify-content-center align-items-center">

        
            <h2>{{ $user->name }}</h2>
            <p><strong>Correo electrónico: </strong>{{ $user->email }}</p>
            <p><strong>ID:</strong> {{ $user->id }}</p>
            <p><strong>Fecha de creación:</strong> {{ $user->created_at }}</p>
            <p><strong>Fecha de actualización:</strong> {{ $user->updated_at }}</p>
            <a href="" class="btn bg-purple text-white">Ver historial</a>
        
    </div>

</div>

@endsection