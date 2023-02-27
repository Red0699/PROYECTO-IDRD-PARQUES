<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Informe PDF</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ public_path('assets/css/bootstrap/bootstrap.min.css') }}" type="text/css">

</head>

<body>
    <!--
    <header class="text-center py-4">
        <div class="container">
            <img src="{{ public_path('argon/img/brand/logo.png') }}" alt="Logo" class="img-fluid mb-3">
            <h1 class="mb-0">DIAGNOSTICO PARQUE</h1>
            <h2>{{ $parque->nombreParque }}</h2>
        </div>
        <div class="row py-3">
            <div class="col">
                <h3>Fecha de visita: {{ date("d/m/Y") }}</h3>
            </div>
            <div class="col">
                <h3>Localidad: {{ $parque->localidad }}</h3>
            </div>
            <div class="col">
                <h3>Codigo: {{ $parque->id }}</h3>
            </div>

        </div>
    </header>
-->


    <div class="container my-5">

        <h3 class="mb-4 text-center">Juegos Infantiles</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <th scope="col">Tipo</th>
                <th scope="col">Iluminacion</th>
                <th scope="col">Material</th>
                <th scope="col">Altura</th>
                <th scope="col">Cerramiento</th>
                <th scope="col">Reservable</th>
                <th scope="col">Largo</th>
                <th scope="col">Ancho</th>
                <th scope="col">Area</th>
                <th scope="col">Superficie</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
            </thead>
            <tbody class="list">
                @forelse ($juegos as $juego)

                <tr>
                    <td>{{ $juego->tipojuego }}</td>
                    <th>{{ $juego->iluminacion }}</th>
                    <th>{{ $juego->material }}</th>
                    <th>{{ $juego->altura }}</th>
                    <th>{{ $juego->cerramiento }}</th>
                    <th>{{ $juego->reservable }}</th>
                    <th>{{ $juego->largo }}</th>
                    <th>{{ $juego->ancho }}</th>
                    <th>{{ $juego->area }}</th>
                    <th>{{ $juego->materialsuperficie }}</th>
                    <th>{{ $juego->descripcion }}</th>
                    <th>{{ $juego->estado }}</th>

                </tr>
                @empty

                <tr>
                    <td colspan="12">Sin registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        

        <h3 class="mb-4 text-center">Canchas Deportivas</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>Tipo</th>
                <th>Iluminacion</th>
                <th>Material</th>
                <th>Cerramiento</th>
                <th>camerino</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Area</th>
                <th>Descripcion</th>
                <th>Estado</th>

            </thead>
            <tbody class="list">
                @forelse ($canchas as $cancha)

                <tr>
                    <td>{{ $cancha->tipocancha}}</td>
                    <th>{{ $cancha->iluminacion }}</th>
                    <th>{{ $cancha->material }}</th>
                    <th>{{ $cancha->cerramiento }}</th>
                    <th>{{ $cancha->camerino }}</th>
                    <th>{{ $cancha->largo }}</th>
                    <th>{{ $cancha->ancho }}</th>
                    <th>{{ $cancha->area }}</th>
                    <th>{{ $cancha->descripcion }}</th>
                    <th>{{ $cancha->estado }}</th>

                </tr>
                @empty

                <tr>
                    <td colspan="10">Sin registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h3 class="mb-4 text-center">Equipamientos</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>modulo</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Area</th>
                <th>agua</th>
                <th>gas</th>
                <th>Descripcion</th>
                <th>Estado</th>

            </thead>
            <tbody class="list">
                @forelse ($equipamientos as $equipamiento)

                <tr>
                    <td>{{ $equipamiento->modulo}}</td>
                    <th>{{ $equipamiento->largo }}</th>
                    <th>{{ $equipamiento->ancho}}</th>
                    <th>{{ $equipamiento->area }}</th>
                    <th>{{ $equipamiento->agua }}</th>
                    <th>{{ $equipamiento->gas }}</th>
                    <th>{{ $equipamiento->descripcion }}</th>
                    <th>{{ $equipamiento->estado }}</th>

                </tr>
                @empty

                <tr>
                    <td colspan="8">Sin registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h3 class="mb-4 text-center">Mobiliarios Urbanos</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>tipo Mobiliario</th>
                <th>material</th>
                <th>longitud</th>
                <th>ubicacion</th>
                <th>Estado</th>

            </thead>
            <tbody class="list">
                @forelse ($mobiliarios as $mobiliario)

                <tr>
                    <td>{{ $mobiliario->tipomobiliario}}</td>
                    <th>{{ $mobiliario->material }}</th>
                    <th>{{ $mobiliario->longitud}}</th>
                    <th>{{ $mobiliario->ubicacion }}</th>
                    <th>{{ $mobiliario->estado}}</th>


                </tr>
                @empty

                <tr>
                    <td colspan="5">Sin registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <h3 class="mb-4 text-center">Escenarios Deportivos</h3>
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>tipo</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Area</th>
                <th>luz</th>
                <th>agua</th>
                <th>gas</th>
                <th>cerramiento</th>
                <th>camerinos</th>
                <th>nbaños</th>
                <th>Descripcion</th>
                <th>Estado</th>

            </thead>
            <tbody class="list">
                @forelse ($escenarios as $escenario)

                <tr>
                    <td>{{ $escenario->tipoescenariodeportivo}}</td>
                    <th>{{ $escenario->largo }}</th>
                    <th>{{ $escenario->ancho }}</th>
                    <th>{{ $escenario->area }}</th>
                    <th>{{ $escenario->luz }}</th>
                    <th>{{ $escenario->agua }}</th>
                    <th>{{ $escenario->gas }}</th>
                    <th>{{ $escenario->cerramiento }}</th>
                    <th>{{ $escenario->camerinos }}</th>
                    <th>{{ $escenario->nbaños }}</th>
                    <th>{{ $escenario->descripcion }}</th>
                    <th>{{ $escenario->estado }}</th>

                </tr>
                @empty

                <tr>
                    <td colspan="12">Sin registros.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        

    </div>
    <!--
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; {{ now()->year }} <a href="https://www.idrd.gov.co" class="font-weight-bold ml-1" target="_blank">IDRD</a> &amp;
                    <a href="https://www.ucundinamarca.edu.co" class="font-weight-bold ml-1" target="_blank">Universidad de Cundinamarca</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <h4>https://www.idrd.gov.co</h4>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    
</body>


</html>