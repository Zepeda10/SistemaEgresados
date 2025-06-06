<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Agregar opción encuesta</h2>

    <?php
        echo '<div class="d-flex flex-column">';
        echo '<form method="post" action="'.base_url().'admin/guardarOpcionEncuesta" class="form-inline">';
        echo '<div class="form-group mb-2">';
        
        echo '<label for="id_pregunta" class="sr-only mt-2 mb-2">Pregunta</label>';
        echo '<select class="form-control mx-auto" id="id_pregunta" name="id_pregunta" style="width: 50%;">';
        // Generar las opciones del select
        foreach ($data['preguntas'] as $opcion) {
            echo '<option value="' . $opcion['id_pregunta'] . '">' . $opcion['texto_pregunta'] . '</option>';
        }
        echo '</select>';
        
        echo '<label for="texto_respuesta" class="sr-only mt-2 mb-2">Texto de opción</label>';
        echo '<input type="text" class="form-control mx-auto" id="texto_respuesta" name="texto_respuesta" value="" style="width: 50%;">';
        
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