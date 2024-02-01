<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Agregar opción subencuesta</h2>

    <?php
    echo '<div class="d-flex flex-column">';
        echo '<form method="post" action="'.base_url().'admin/guardarOpcionSubencuesta" class="form-inline">';
        echo '<div class="form-group mb-2">';
        
        echo '<label for="id_pregunta" class="sr-only mt-2 mb-2">Pregunta</label>';
        echo '<input type="text" class="form-control mx-auto" id="id_pregunta" name="id_pregunta_subencuesta" value="" style="width: 50%;">';

        echo '<label for="texto_respuesta" class="sr-only mt-2 mb-2">Opción</label>';
        echo '<input type="text" class="form-control mx-auto" id="texto_respuesta" name="texto_respuesta" value="" style="width: 50%;">';

        echo '<label for="valor_numerico" class="sr-only mt-2 mb-2">Valor</label>';
        echo '<input type="text" class="form-control mx-auto" id="valor_numerico" name="valor_numerico" value="" style="width: 50%;">';

        echo '</div>';
        echo '<button type="submit" class="btn btn-primary mx-auto">Guardar</button>';
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