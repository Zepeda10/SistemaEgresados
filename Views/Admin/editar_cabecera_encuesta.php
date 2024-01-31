<?php
include("Layouts/header2.php");
include("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar encuesta</h2>

    <?php
     echo '<div class="d-flex flex-column">'; 
     echo '<form method="post" action="'.base_url().'admin/actualizarEncuesta" class="form-inline">'; 
         echo '<div class="form-group mb-2">';
         echo '<label for="titulo_encuesta" class="sr-only mt-2 mb-2">Título</label>';
         echo '<input type="text" class="form-control mx-auto" id="titulo_encuesta" name="titulo_encuesta" value="' . $data["encuesta"]["titulo_encuesta"] . '" style="width: 50%;">';
         echo '<input type="hidden" name="id_encuesta" value="'. $data["encuesta"]["id_encuesta"] .'">'; 
         echo '</div>';
         echo '<button type="submit" class="btn btn-primary">Actualizar</button>'; 
     echo '</form>';
  
     echo '</div>'; // Cerrar el contenedor de columna

    ?>

</div>
</main>
</div>
</div>

<?php
include("Layouts/footer.php");
?>

