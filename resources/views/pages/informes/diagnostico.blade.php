@extends('layouts.app')

@section('content')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
</link>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
</link>
@endpush

<style>

</style>

<div>
    <h1>Informe de Diagnóstico del Parque</h1>

    <h2>Tabla de diagnósticos</h2>
    <div class="table-responsive m-2">
        <table class="table-striped table-bordered mb-5" id="informeTable">
            <thead>
                <tr>
                    <th>Codigo Recurso</th>
                    <th>Tipo de recurso</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach($diagnosticos as $diagnostico)
                <tr>
                    <td>{{ $diagnostico->id_recurso }}</td>
                    <td>{{ $diagnostico->tipoRecurso }}</td>
                    <td>{{ $diagnostico->estado }}</td>
                    <td>{{ $diagnostico->fecha }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <h2>Estado de los recursos del parque</h2>
    <canvas id="grafico-estados"></canvas>



</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
<script>
    // Obtener los diagnósticos del parque
    var diagnosicos = <?php echo json_encode($diagnosticos); ?>;

    // Contar los recursos en cada estado
    var estados = ["Bueno con diagnóstico", "En mal estado", "En proceso de mantenimiento", "Pendiente de piezas", "En prueba"];
    var recursosPorEstado = {};
    diagnosicos.forEach(function(diagnostico) {
        var estado = diagnostico.estado;
        if (estado in recursosPorEstado) {
            recursosPorEstado[estado] += 1;
        } else {
            recursosPorEstado[estado] = 1;
        }
    });

    // Configurar el gráfico
    var config = {
        type: 'bar',
        data: {
            labels: estados,
            datasets: [{
                label: 'Recursos por estado',
                data: [
                    recursosPorEstado["Bueno con diagnóstico"] || 0,
                    recursosPorEstado["En mal estado"] || 0,
                    recursosPorEstado["En proceso de mantenimiento"] || 0,
                    recursosPorEstado["Pendiente de piezas"] || 0,
                    recursosPorEstado["En prueba"] || 0
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Dibujar el gráfico
    var ctx = document.getElementById('grafico-estados').getContext('2d');
    var graficoEstados = new Chart(ctx, config);
</script>


@endsection

@push('js')
<script src="/assets-old/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/fonts/Roboto.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#informeTable').DataTable({
            "scrollX": true,
            "scrollCollapse": true,
            "paging": true,
            "ordering": true,
            "searching": true,
            "info": true,
            dom: 'Bfrtip',
            buttons: ['pageLength', 'excelHtml5', 'pdfHtml5'],
            language: {
                lengthMenu: 'Mostrando _MENU_ registros por página',
                zeroRecords: 'No hay registros para mostrar',
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'No hay registros...',
                infoFiltered: '(filtrando de _MAX_ registros disponibles)',
                sSearch: 'Buscar',
                'paginate': {
                    'previous': '<i class="fas fa-light fa-arrow-left"></i>',
                    'next': '<i class="fas fa-light fa-arrow-right"></i>'
                },
                buttons: {
                    pageLength: 'Mostrando %d filas'
                },
            },
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>
<script>
    // Obtener los diagnósticos del parque
    var diagnosicos = <?php echo json_encode($diagnosticos); ?>;

    // Contar los recursos en cada estado
    var estados = ["Bueno con diagnóstico", "En mal estado", "En proceso de mantenimiento", "Pendiente de piezas", "En prueba"];
    var recursosPorEstado = {};
    diagnosicos.forEach(function(diagnostico) {
        var estado = diagnostico.estado;
        if (estado in recursosPorEstado) {
            recursosPorEstado[estado] += 1;
        } else {
            recursosPorEstado[estado] = 1;
        }
    });

    // Configurar el gráfico
    var config = {
        type: 'bar',
        data: {
            labels: estados,
            datasets: [{
                label: 'Recursos por estado',
                data: [
                    recursosPorEstado["Bueno con diagnóstico"] || 0,
                    recursosPorEstado["En mal estado"] || 0,
                    recursosPorEstado["En proceso de mantenimiento"] || 0,
                    recursosPorEstado["Pendiente de piezas"] || 0,
                    recursosPorEstado["En prueba"] || 0
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Dibujar el gráfico
    var ctx = document.getElementById('grafico-estados').getContext('2d');
    var graficoEstados = new Chart(ctx, config);
</script>
@endpush