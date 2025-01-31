<?php   
    include ("Layouts/header.php");
?>

<?php   
    include ("Layouts/sidebar.php");
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    /* Estilos personalizados */
    .form-container {
        margin-bottom: 20px;
    }
    .content {
        margin-top: 20px;
    }
    button {
        font-size: 1em;
    }
</style>

<!-- Área de contenido -->
<div class="content text-center">
    <h1 class="mb-4">Generador de Gráficas de Encuestas</h1>

    <!-- Formulario con estilo Bootstrap -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <label for="encuesta" class="form-label">Selecciona la Encuesta:</label>
                    <select id="encuesta" class="form-control">
                        <option value="1">Encuesta 1</option>
                        <option value="2">Encuesta 2</option>
                        <option value="3">Encuesta 3</option>
                        <option value="4">Encuesta 4</option>
                        <option value="5">Encuesta 5</option>
                        <option value="6">Encuesta 6</option>
                    </select>
                </div>

                <div class="form-container">
                    <label for="fechaInicio" class="form-label">Fecha de Inicio:</label>
                    <input type="date" id="fechaInicio" class="form-control">
                </div>

                <div class="form-container">
                    <label for="fechaFin" class="form-label">Fecha de Fin:</label>
                    <input type="date" id="fechaFin" class="form-control">
                </div>

                <button onclick="generarGrafica()" class="btn btn-primary mt-3">Generar Gráfica</button>
            </div>
        </div>
    </div>

    <script>
        function generarGrafica() {
            // Obtener valores del formulario
            const encuesta = document.getElementById('encuesta').value;
            const fechaInicio = document.getElementById('fechaInicio').value;
            const fechaFin = document.getElementById('fechaFin').value;

            // Construir la URL con los parámetros de la encuesta y fechas seleccionadas
            const url = `mostrarGraficas?encuesta=${encuesta}&fechaInicio=${fechaInicio}&fechaFin=${fechaFin}`;

            // Abrir nueva ventana con la URL generada
            window.open(url, "_blank", "width=800,height=600");
        }
    </script>
</div>

<?php   
    include ("Layouts/footer.php");
?>
