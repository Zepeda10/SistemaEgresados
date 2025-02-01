<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>
 
<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Agregar pregunta encuesta</h2>

    <?php
        echo '<div class="d-flex flex-column">';
        echo '<form method="post" action="'.base_url().'admin/guardarPreguntaEncuesta" class="form-inline">';
            echo '<div class="form-group mb-2">';

            echo '<label for="id_encuesta" class="sr-only mt-2 mb-2">Encuesta</label>';
            echo '<select class="form-control mx-auto" id="id_encuesta" name="id_encuesta" style="width: 50%;">';
            for ($i = 1; $i <= 7; $i++) {
                echo '<option value='.$i.'>'.$i.'</option>';
            }
            echo '</select>';

            echo '<label for="tipo_pregunta" class="sr-only mt-2 mb-2">Tipo de pregunta</label>';
            echo '<select class="form-control mx-auto" id="tipo_pregunta" name="tipo_pregunta" style="width: 50%;">';
            $tipos_pregunta = ["Abierta", "Selección", "Radio", "Checkbox"];
            foreach ($tipos_pregunta as $tipo) {
                echo '<option value="'.$tipo.'">'.$tipo.'</option>';
            }
            echo '</select>';

            echo '<label for="texto_pregunta" class="sr-only mt-2 mb-2">Pregunta</label>';
            echo '<input type="text" class="form-control mx-auto" id="texto_pregunta" name="texto_pregunta" value="" style="width: 50%;">';

            echo '</div>';
            echo '<div class="d-flex justify-content-between mt-3" style="width: 50%; margin: 0 auto;">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" onclick="window.history.back();" class="btn btn-secondary">Cancelar</button>
                </div>';
        echo '</form>';
        echo '</div>';
?>

</div>
</main>
</div>
</div>

<?php   
    include ("Layouts/footer.php");
?>