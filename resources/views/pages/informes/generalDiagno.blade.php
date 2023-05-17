

@extends('layouts.app')

@section('content')

<!-- Título de la página -->
<div class="container-fluid bg-purple py-4 text-white">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-white">Informe de diagnosticos de parques con sus recursos</h1>
            
        </div>
    </div>
</div>
<!-- Contenido principal -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <iframe title="Report Section" width="100%" height="800px" src="https://app.powerbi.com/view?r=eyJrIjoiYTNkMWM1YjMtM2JjZi00MjcyLWFiMGQtYjBhNzBlMzJiMTE3IiwidCI6IjA3ZGE2N2EwLTFmNDMtNGU4Yy05NzdmLTVmODhiNjQ3MGVlNiIsImMiOjR9" frameborder="0" allowFullScreen="true"></iframe>
        </div>
    </div>
</div>

@include('layouts.footers.guest')
@endsection