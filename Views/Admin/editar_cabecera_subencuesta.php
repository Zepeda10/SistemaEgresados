<?php
include("Layouts/header2.php");
include("Layouts/sidebar2.php");
?>

<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar subencuesta</h2>

    <?php
     echo '<div class="d-flex flex-column">'; // Crear un contenedor de columna
     echo '<form method="post" action="'.base_url().'admin/actualizarSubencuesta" class="form-inline">'; // Agregamos la clase "form-inline" para hacer el formulario más pequeño
         echo '<div class="form-group mb-2">';
         echo '<label for="titulo_encuesta" class="sr-only">Título</label>';
         echo '<input type="text" class="form-control col-2" id="titulo" name="titulo" value="' . $data["subencuesta"]["titulo"] . '" >';
         echo '<label for="titulo_encuesta" class="sr-only">Descripción</label>';
         echo '<input type="text" class="form-control col-2" id="descripcion" name="descripcion" value="' . $data["subencuesta"]["descripcion"] . '" >';
         echo '<input type="hidden" name="id_subencuesta" value="'. $data["subencuesta"]["id_subencuesta"] .'">'; 
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

