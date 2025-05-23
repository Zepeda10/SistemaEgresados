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

  <?php
    $tituloEncuesta = '';
    foreach ($data["graficasAgrupadas"] as $grupo) {
        if (!empty($grupo) && isset($grupo[0]['titulo'])) {
            $tituloEncuesta = $grupo[0]['titulo'];
            break;
        }
    }
    ?>

    <h2 class="text-center">Gráfica de la encuesta "<?php echo $tituloEncuesta ?>"</h2>
    <p class="text-center"><?php echo htmlspecialchars($_GET['fechaInicio'] ?? ''); ?> a <?php echo htmlspecialchars($_GET['fechaFin'] ?? ''); ?></p>
    

    <?php
function getColorByValue($value, $min, $max) {
  if ($max == $min) return 'rgba(255, 0, 0, 0.8)';

    $ratio = ($value - $min) / ($max - $min);

    if ($ratio < 0.5) {
        // De Azul (0,0,255) a Amarillo (255,255,0)
        $r = (int)($ratio * 2 * 255);
        $g = (int)($ratio * 2 * 255);
        $b = 255 - (int)($ratio * 2 * 255);
    } else {
        // De Amarillo (255,255,0) a Rojo (255,0,0)
        $r = 255;
        $g = 255 - (int)(($ratio - 0.5) * 2 * 255);
        $b = 0;
    }

    return "rgba($r, $g, $b, 0.8)";
}
?>

<body>

    <?php foreach ($data["graficasAgrupadas"] as $pregunta => $respuestas): ?>
        <?php
        $valores = array_map(fn($r) => $r['total_respuestas'], $respuestas);
        $min = min($valores);
        $max = max($valores);

        $colores = [];
        foreach ($respuestas as $resp) {
            $colores[] = getColorByValue($resp['total_respuestas'], $min, $max);
        }

        $labelsJS = implode(", ", array_map(fn($r) => '"' . addslashes($r['texto_respuesta']) . '"', $respuestas));
        $dataJS = implode(", ", array_map(fn($r) => $r['total_respuestas'], $respuestas));
        $colorsJS = implode(", ", array_map(fn($c) => '"' . $c . '"', $colores));
        ?>

        <h4 class="text-secondary"><?php echo htmlspecialchars($pregunta); ?></h4>
        <canvas id="grafica_<?php echo md5($pregunta); ?>" width="400" height="200"></canvas>

        <script>
            const datos_<?php echo md5($pregunta); ?> = {
                labels: [<?php echo $labelsJS; ?>],
                datasets: [{
                    label: "Respuestas",
                    data: [<?php echo $dataJS; ?>],
                    backgroundColor: [<?php echo $colorsJS; ?>],
                    borderColor: "#333",
                    borderWidth: 1,
                    barThickness: 85
                }]
            };

            const config_<?php echo md5($pregunta); ?> = {
                type: 'bar',
                data: datos_<?php echo md5($pregunta); ?>,
                options: {
                    responsive: true,
                    scales: {
        x: {
            ticks: { autoSkip: false },
            categoryPercentage: 0.5,
            barPercentage: 0.5  
        },
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
