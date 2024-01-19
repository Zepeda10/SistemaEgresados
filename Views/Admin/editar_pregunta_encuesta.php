<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>
 
<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar pregunta encuesta</h2>

    <?php
     echo '<div class="d-flex flex-column">'; 
     echo '<form method="post" action="'.base_url().'admin/actualizarPreguntaEncuesta" class="form-inline">';
         echo '<div class="form-group mb-2">';
         echo '<label for="id_encuesta" class="sr-only">Encuesta</label>';
         echo '<input type="text" class="form-control col-2" id="id_encuesta" name="id_encuesta" value="' . $data["pregunta"]["id_encuesta"] . '" >';
         echo '<label for="tipo_pregunta" class="sr-only">Tipo de pregunta</label>';
         echo '<input type="text" class="form-control col-2" id="tipo_pregunta" name="tipo_pregunta" value="' . $data["pregunta"]["tipo_pregunta"] . '" >';
         echo '<label for="texto_pregunta" class="sr-only">Pregunta</label>';
         echo '<input type="text" class="form-control col-2" id="texto_pregunta" name="texto_pregunta" value="' . $data["pregunta"]["texto_pregunta"] . '" >';
         echo '<input type="hidden" name="id_pregunta" value="'. $data["pregunta"]["id_pregunta"] .'">'; 
         echo '</div>';
         echo '<button type="submit" class="btn btn-primary">Actualizar</button>'; 
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