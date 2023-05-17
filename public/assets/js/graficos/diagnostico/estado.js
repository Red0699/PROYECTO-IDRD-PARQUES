
// Obtener los diagnósticos del parque
var diagnosicos = {!! json_encode($diagnosticos) !!};

// Contar los recursos en cada estado
var estados = ["Bueno con diagnóstico", "En mal estado", "En proceso de mantenimiento", "Pendiente de piezas", "En prueba"];
var recursosPorEstado = {};
diagnosicos.forEach(function (diagnostico) {
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
