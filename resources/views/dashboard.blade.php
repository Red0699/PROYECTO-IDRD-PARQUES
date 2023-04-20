@extends('layouts.app')

@section('content')

<style>

</style>

<div>
    <!-- Título de la página -->
    <div class="container-fluid bg-purple py-6 text-white">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-white">Bienvenido al Sistema de Gestión y Control de Parques IDRD: Administración Eficiente y Segura</h1>
            </div>
        </div>
    </div>

    <!-- Informacion -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="card-title text-center mb-4">¿Qué puedes hacer en este sistema?</h2>
                            <ul>
                                <li>Crear, editar y eliminar parques</li>
                                <li>Agregar, editar y eliminar recursos en los parques en la sección de Inventario</li>
                                <li>Realizar y ver diagnósticos de los recursos de cada parque</li>
                                <li>Ver informes detallados de los parques, inventario y diagnósticos</li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('assets/img/brand/infogestion.jpg') }}" alt="Icono de Gestion" width="60%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------ Informacion general de parques ----------->
    <div class="row justify-content-center mt-5">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('assets/img/brand/infoparques.png') }}" alt="Icono de Parques" width="60%">
                        </div>
                        <div class="col-md-6">
                            <h2 class="card-title text-center mb-4">Información general de los parques</h2>
                            <ul>
                                <li>Número total de parques registrados en el sistema</li>
                                <li>Número total de recursos registrados en los parques</li>
                                <li>Resumen de los diagnósticos de los parques y los recursos</li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="{{ route('parque.index') }}" class="btn bg-purple text-white">Ir a Parques</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------- Información de Inventario ------------->
    <div class="row justify-content-center mt-5">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h2 class="card-title text-center mb-4">Módulos de recursos en el inventario</h2>
                            <p>En el módulo de inventario podrás gestionar los siguientes recursos:</p>
                            <ul>
                                <li>Canchas deportivas</li>
                                <li>Juegos infantiles</li>
                                <li>Escenarios deportivos</li>
                                <li>Equipamientos</li>
                                <li>Mobiliarios urbanos</li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="{{ route('inventario') }}" class="btn bg-purple text-white">Ir a Inventario</a>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ asset('assets/img/brand/infoinventario.png') }}" alt="Icono de Inventario" width="60%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----------------- Informes --------------------->
    <div class="container py-5">
        <h2 class="text-center">Ver Informes</h2>
        <div class="row justify-content-around">
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Parques</h2>
                        <p class="card-text">Ver informes relacionados con los parques.</p>
                        <a href="#" class="btn w-100 bg-purple text-white">Ver informes</a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Diagnósticos</h2>
                        <p class="card-text">Ver informes relacionados con los diagnósticos.</p>
                        <a href="#" class="btn w-100 bg-purple text-white">Ver informes</a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Inventario</h2>
                        <p class="card-text">Ver informes relacionados con el inventario.</p>
                        <a href="#" class="btn w-100 bg-purple text-white">Ver informes</a>
                    </div>
                </div>
            </div>
            @if(auth()->user()->id == 1)
            <div class="col-10 col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Usuarios</h2>
                        <p class="card-text">Ver informes relacionados con los usuarios.</p>
                        <a href="#" class="btn w-100 bg-purple text-white">Ver informes</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

</div>

@endsection