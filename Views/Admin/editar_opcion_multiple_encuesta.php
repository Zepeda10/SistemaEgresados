<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar opción encuesta</h2>

    <?php
     echo '<div class="d-flex flex-column">'; 
     echo '<form method="post" action="'.base_url().'admin/actualizarOpcionEncuesta" class="form-inline">';
         echo '<div class="form-group mb-2">';
         echo '<label for="id_pregunta" class="sr-only">Pregunta</label>';
         echo '<input type="text" class="form-control col-2" id="id_pregunta" name="id_pregunta" value="' . $data["opcion"]["id_pregunta"] . '" >';
         echo '<label for="texto_respuesta" class="sr-only">Opción</label>';
         echo '<input type="text" class="form-control col-2" id="texto_respuesta" name="texto_respuesta" value="' . $data["opcion"]["texto_respuesta"] . '" >';
         echo '<label for="valor_numerico" class="sr-only">Valor</label>';
         echo '<input type="text" class="form-control col-2" id="valor_numerico" name="valor_numerico" value="' . $data["opcion"]["valor_numerico"] . '" >';
         echo '<input type="hidden" name="id_respuesta" value="'. $data["opcion"]["id_respuesta"] .'">'; 
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