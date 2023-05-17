@extends('layouts.app')

@section('content')

<!-- Título de la página -->
<div class="container-fluid bg-purple py-4 text-white">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-white">Informe de inventario de parques con sus recursos</h1>
            <p>Este informe presenta el inventario de los recursos en los parques, incluyendo las canchas deportivas, escenarios deportivos, juegos infantiles, equipamientos y mobiliarios urbanos.</p>
            <p>Utilice los siguientes filtros para personalizar el informe:</p>
        </div>
    </div>
</div>
<!-- Contenido principal -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <iframe title="Report Section" width="100%" height="800px" src="https://app.powerbi.com/view?r=eyJrIjoiNWQ4MGNmMjYtZDU5Ny00ZjM1LTkyMWItYzE5YmI1ZGMyYjRlIiwidCI6IjA3ZGE2N2EwLTFmNDMtNGU4Yy05NzdmLTVmODhiNjQ3MGVlNiIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>
        </div>
    </div>
</div>

@include('layouts.footers.guest')
@endsection