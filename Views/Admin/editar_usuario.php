<?php   
    include ("Layouts/header2.php");
    include ("Layouts/sidebar2.php");
?>
 
<!-- Área de contenido -->
<div class="content text-center">
    <h2 class="mb-4">Editar usuario</h2>

    <?php
     echo '<div class="d-flex flex-column">'; 
     echo '<form method="post" action="'.base_url().'admin/actualizarUsuario" class="form-inline">';
         echo '<div class="form-group mb-2">';
         echo '<label for="nombre" class="sr-only">Nombre completo</label>';
         echo '<input type="text" class="form-control col-2" id="nombre" name="nombre" value="' . $data["usuario"]["nombre"] . '" >';
         echo '<label for="numero_estudiante" class="sr-only">No. estudiante</label>';
         echo '<input type="text" class="form-control col-2" id="numero_estudiante" name="numero_estudiante" value="' . $data["usuario"]["numero_estudiante"] . '" >';
         echo '<label for="correo" class="sr-only">Correo</label>';
         echo '<input type="text" class="form-control col-2" id="correo" name="correo" value="' . $data["usuario"]["correo"] . '" >';
         echo '<label for="tipo" class="sr-only">Tipo</label>';
         echo '<input type="text" class="form-control col-2" id="tipo" name="tipo" value="' . $data["usuario"]["tipo"] . '" >';
         echo '<input type="hidden" name="id_usuario" value="'. $data["usuario"]["id_usuario"] .'">'; 
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