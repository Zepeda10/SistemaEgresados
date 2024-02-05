<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar opción subencuesta</h2>

    <?php
echo '<div class="d-flex flex-column">';
echo '<form method="post" action="'.base_url().'admin/actualizarOpcionSubencuesta" class="form-inline">';
    echo '<div class="form-group mb-2">';
    
    echo '<label for="id_pregunta" class="sr-only mt-2 mb-2">Pregunta</label>';
    echo '<select class="form-control mx-auto" id="id_pregunta" name="id_pregunta_subencuesta" style="width: 50%;">';
    // Generar las opciones del select
    foreach ($data['preguntas'] as $opcion) {
        echo '<option value="' . $opcion['id_pregunta_subencuesta'] . '">' . $opcion['texto_pregunta'] . '</option>';
    }
    echo '</select>';

    echo '<label for="texto_respuesta" class="sr-only mt-2 mb-2">Opción</label>';
    echo '<input type="text" class="form-control mx-auto" id="texto_respuesta" name="texto_respuesta" value="' . $data["opcion"]["texto_respuesta"] . '" style="width: 50%;">';

    echo '<label for="valor_numerico" class="sr-only mt-2 mb-2">Valor</label>';
    echo '<input type="text" class="form-control mx-auto" id="valor_numerico" name="valor_numerico" value="' . $data["opcion"]["valor_numerico"] . '" style="width: 50%;">';

    echo '<input type="hidden" name="id_respuesta" value="'. $data["opcion"]["id_respuesta"] .'">';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary mx-auto">Actualizar</button>';
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