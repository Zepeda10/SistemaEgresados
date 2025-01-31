<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gráfica de Encuesta</title>
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
    <h1>Gráfica de la Encuesta</h1>
    <canvas id="grafica" width="400" height="200"></canvas>

    <script>
      // Obtener los parámetros de la URL
      const urlParams = new URLSearchParams(window.location.search);
      const encuesta = urlParams.get("encuesta");
      const fechaInicio = urlParams.get("fechaInicio");
      const fechaFin = urlParams.get("fechaFin");

      // Mostrar los datos seleccionados (opcional, solo para ver los valores)
      console.log(
        `Encuesta: ${encuesta}, Fecha Inicio: ${fechaInicio}, Fecha Fin: ${fechaFin}`
      );

      // Aquí es donde debes integrar los datos reales de la encuesta según el parámetro `encuesta` y las fechas seleccionadas
      // Los datos y etiquetas deben ser obtenidos dinámicamente desde la base de datos o de una API

      // Datos de ejemplo (debes reemplazar estos con los datos reales)
      const datos = {
        labels: ["Enero", "Febrero", "Marzo"], // Etiquetas de ejemplo
        datasets: [
          {
            label: `Resultados Encuesta ${encuesta}`,
            data: [65, 59, 80], // Resultados de ejemplo
            backgroundColor: "rgba(75, 192, 192, 0.2)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1,
          },
        ],
      };

      const config = {
        type: "bar", // Tipo de gráfico: barra
        data: datos,
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      };

      // Obtener el contexto del canvas y generar el gráfico
      const ctx = document.getElementById("grafica").getContext("2d");
      new Chart(ctx, config);
    </script>
  </body>
</html>
