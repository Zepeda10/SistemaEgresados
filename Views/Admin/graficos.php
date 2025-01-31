<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gráfica de Encuesta</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
      }
      canvas {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
      }
    </style>
  </head>
  <body> 
    <h2 class="text-center">Gráfica de la Encuesta <?php echo htmlspecialchars($_GET['encuesta'] ?? ''); ?></h2>
    <p class="text-center"><?php echo htmlspecialchars($_GET['fechaInicio'] ?? ''); ?> a <?php echo htmlspecialchars($_GET['fechaFin'] ?? ''); ?></p>

    <?php foreach ($data["graficasAgrupadas"] as $pregunta => $respuestas): ?>
        <h4 class="text-secondary"><?php echo htmlspecialchars($pregunta); ?></h4>
        <canvas id="grafica_<?php echo md5($pregunta); ?>" width="400" height="200"></canvas>

        <script>
            const datos_<?php echo md5($pregunta); ?> = {
                labels: [<?php echo implode(", ", array_map(function($resp) { return '"' . addslashes($resp['texto_respuesta']) . '"'; }, $respuestas)); ?>],
                datasets: [{
                    label: "Respuestas",
                    data: [<?php echo implode(", ", array_map(function($resp) { return $resp['total_respuestas']; }, $respuestas)); ?>],
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            };

            const config_<?php echo md5($pregunta); ?> = {
                type: 'bar',
                data: datos_<?php echo md5($pregunta); ?>,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const ctx_<?php echo md5($pregunta); ?> = document.getElementById("grafica_<?php echo md5($pregunta); ?>").getContext("2d");
            new Chart(ctx_<?php echo md5($pregunta); ?>, config_<?php echo md5($pregunta); ?>);
        </script>
    <?php endforeach; ?>
  </body>
</html>
