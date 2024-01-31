<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>
 
<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar pregunta subencuesta</h2>

    <?php
     echo '<div class="d-flex flex-column">';
     echo '<form method="post" action="'.base_url().'admin/actualizarPreguntaSubencuesta" class="form-inline">';
         echo '<div class="form-group mb-2">';

         echo '<label for="id_subencuesta" class="sr-only mt-2 mb-2">Subencuesta</label>';
         echo '<input type="text" class="form-control mx-auto" id="id_subencuesta" name="id_subencuesta" value="' . $data["pregunta"]["id_subencuesta"] . '" style="width: 50%;">';

         echo '<label for="tipo_pregunta" class="sr-only mt-2 mb-2">Tipo de pregunta</label>';
         echo '<input type="text" class="form-control mx-auto" id="tipo_pregunta" name="tipo_pregunta" value="' . $data["pregunta"]["tipo_pregunta"] . '" style="width: 50%;">';

         echo '<label for="texto_pregunta" class="sr-only mt-2 mb-2">Pregunta</label>';
         echo '<input type="text" class="form-control mx-auto" id="texto_pregunta" name="texto_pregunta" value="' . $data["pregunta"]["texto_pregunta"] . '" style="width: 50%;">';
     
         echo '<input type="hidden" name="id_pregunta_subencuesta" value="'. $data["pregunta"]["id_pregunta_subencuesta"] .'">';
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