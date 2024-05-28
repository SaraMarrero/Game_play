<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    let json = <?php echo $contenido; ?>

    let contador_ps5 = 0; 
    let contador_xbox = 0;
    let contador_nintendo = 0;
    let contador_pc = 0;

    let ps5;
    let xbox;
    let nintendo;
    let pc;

    json.forEach(e => {
        if(e.id_consola == 1){ contador_ps5++}
        if(e.id_consola == 2){ contador_xbox++; }
        if(e.id_consola == 3){ contador_nintendo++; }
        if(e.id_consola == 4){ contador_pc++; }
    });

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Juegos por consola'],
            ['Play Station 5', contador_ps5],
            ['Xbox Series', contador_xbox],
            ['Nintendo Switch', contador_nintendo],
            ['PC', contador_pc]
        ]);

        var options = {
            title: 'Porcentaje de juegos por consola',
            backgroundColor: '#E5E7EB',
            colors: ['#1D4ED8', '#047857', '#EF4444', '#7C3AED']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
    </script>
</head>
<main class="bg-gray-200 w-4/5 h-screen p-5">
    <!-- Botón para volver al index del admin -->
	<a href="/admin/index" class="text-white bg-purple-600 hover:bg-purple-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Volver</a>
    
    <div id="piechart" class="h-5/6"></div>
</main>
</html>
