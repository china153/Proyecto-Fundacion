<!--estadisticasView.php-->

<div style="max-width: 800px; margin: 50px auto;">
    <h2 style="text-align:center;">Estadísticas de Voluntarios</h2>
    <canvas id="graficoGenero" width="400" height="200"></canvas>

    <h2 style="text-align:center; margin-top:50px;">Fechas con Más Eventos</h2>
    <canvas id="graficoFechas" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Datos para gráfico de género
    const dataGenero = {
        labels: <?php echo json_encode(array_column($dataGenero, 'genero')); ?>,
        datasets: [{
            label: 'Cantidad de voluntarios por sexo',
            data: <?php echo json_encode(array_column($dataGenero, 'cantidad')); ?>,
            backgroundColor: ['#36A2EB', '#FF6384'],
        }]
    };

    const configGenero = {
        type: 'bar',
        data: dataGenero,
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Voluntarios por sexo' }
            }
        },
    };

    // Datos para gráfico de fechas
    const dataFechas = {
        labels: <?php echo json_encode(array_column($dataFechas, 'fecha')); ?>,
        datasets: [{
            label: 'Eventos por fecha',
            data: <?php echo json_encode(array_column($dataFechas, 'cantidad')); ?>,
            backgroundColor: '#4CAF50',
        }]
    };

    const configFechas = {
        type: 'bar',
        data: dataFechas,
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: { display: true, text: 'Fechas con más eventos' }
            }
        },
    };

    new Chart(document.getElementById('graficoGenero'), configGenero);
    new Chart(document.getElementById('graficoFechas'), configFechas);
</script>
